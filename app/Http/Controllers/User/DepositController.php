<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\Transaction;

class DepositController extends Controller
{
    public function index()
    {

      $data['deposit'] =  Deposit::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('user.deposit.index', $data);
    }

    public function FixedDeposit()
    {
        return view('user.fixed-deposit');
    }

    public function MutualFunds()
    {
        return view('user.mutual-funds');
    }





    public function MakeDeposit(Request $request)
{
    $request->validate([
        'method' => 'required|in:bank,crypto',
        'amount' => 'required|numeric|min:10',
        'currency' => 'nullable|string'
    ]);

    DB::beginTransaction();

    try {
        $user = Auth::user();
        $amount = $request->input('amount');
        $method = $request->input('method');
        $currency = $request->input('currency') ?? 'usd';
        $referenceId = 'DEP-' . strtoupper(Str::random(8));
        $transaction_id = strtoupper(Str::random(12));

        // Save Deposit
        $deposit = new Deposit;
        $deposit->user_id = $user->id;
        $deposit->method = $method;
        $deposit->currency = $currency;
        $deposit->amount = $amount;
        $deposit->status = 0;
        $deposit->reference_id = $referenceId;
        $deposit->save();

        // Save Transaction
        $transaction = new Transaction;
        $transaction->user_id = $user->id;
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Credit";
        $transaction->transaction = "credit";
        $transaction->credit = $amount;
        $transaction->debit = 0;
        $transaction->status = 0;
        $transaction->save();

        DB::commit();

        return response()->json([
            'success' => true,
            'type' => $method,
            'currency' => $currency,
            'amount' => $amount,
            'referenceId' => $referenceId
        ]);

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred.',
            'error' => $e->getMessage()
        ], 500);
    }
}



    // public function MakeDeposit(Request $request)
    // {
    //     $request->validate([
    //         'method' => 'required|in:bank,crypto',
    //         'amount' => 'required|numeric|min:10',
    //         'currency' => 'nullable|string',
    //     ]);

    //     DB::beginTransaction();

    //     try {
    //         $user = Auth::user();
    //         $amount = $request->input('amount');
    //         $method = $request->input('method');
    //         $currency = $request->input('currency') ?? 'usd';
    //         $referenceId = 'DEP-' . strtoupper(Str::random(8));
    //         $transactionId = strtoupper(Str::random(12));

    //         // Save to deposits table
    //         $deposit = new Deposit();
    //         $deposit->user_id = $user->id;
    //         $deposit->method = $method;
    //         $deposit->currency = $currency;
    //         $deposit->amount = $amount;
    //         $deposit->status = 0; // 0 = pending
    //         $deposit->reference_id = $referenceId;
    //         $deposit->save();

    //         // Save to transactions table
    //         $transaction = new Transaction();
    //         $transaction->user_id = $user->id;
    //         $transaction->transaction_id = $transactionId;
    //         $transaction->transaction_type = 'Credit';
    //         $transaction->transaction = 'credit';
    //         $transaction->credit = $amount;
    //         $transaction->debit = 0;
    //         $transaction->status = 0;
    //         $transaction->save();

    //         DB::commit();

    //         $response = [
    //             'success' => true,
    //             'type' => $method,
    //             'currency' => $currency,
    //             'amount' => $amount,
    //             'referenceId' => $referenceId
    //         ];

    //         // Optional: Include wallet address if it's a crypto deposit
    //         if ($method === 'crypto') {
    //             $response['address'] = $this->generateCryptoAddress($currency);
    //         }

    //         return response()->json($response);
    //     } catch (\Exception $e) {
    //         DB::rollBack();

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Something went wrong.',
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    // private function generateCryptoAddress($currency)
    // {
    //     return match (strtolower($currency)) {
    //         'btc' => '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa',
    //         'eth' => '0xDECAF9CD2367cdbb726E904cD6397eDFcAe6068D',
    //         'usdt' => 'TG3XXyExBkPp9nzdajDZsozEu4BkaSJozs',
    //         'usdc' => '0xA0b86991c6218b36c1d19D4a2e9Eb0cE3606eB48',
    //         default => 'UnknownCurrency',
    //     };
    // }




public function store(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:1000',
        'tenure' => 'required|in:3,6,12,24,36',
        'payment_method' => 'required|in:wallet,bank',
    ]);

    $interestRates = [
        3 => 3.5,
        6 => 4.2,
        12 => 5.1,
        24 => 5.8,
        36 => 6.5,
    ];

    $rate = $interestRates[$request->tenure];
    $interestEarned = ($request->amount * $rate * $request->tenure) / (12 * 100);
    $maturityAmount = $request->amount + $interestEarned;
    $maturityDate = now()->addMonths($request->tenure);

    $referenceId = 'DEP-' . strtoupper(Str::random(10));

    $deposit = Deposit::create([
        'user_id' => Auth::id(),
        'reference_id' => $referenceId,
        'amount' => $request->amount,
        'tenure' => $request->tenure,
        'interest_rate' => $rate,
        'payment_method' => $request->payment_method,
        'maturity_date' => $maturityDate,
        'maturity_amount' => $maturityAmount,
        'status' => 0,
    ]);

    Transaction::create([
        'user_id' => Auth::id(),
        'transaction_id' => $referenceId,
        'transaction_type' => 'Debit',
        'transaction' => 'debit',
        'credit' => 0,
        'debit' => $request->amount,
        'status' => 0,
    ]);

    return back()->with('success', 'Deposit submitted successfully!');
}
}

