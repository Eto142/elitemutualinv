<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use Illuminate\Support\Str;

class WithdrawalController extends Controller
{
    //

      public function index(){

   $withdrawals = Withdrawal::where('user_id', Auth::id())->orderByDesc('id')->get();
        return view('user.withdrawal.index', compact('withdrawals'));
}






public function MakeWithdrawal(Request $request)
{
    $request->validate([
        'method' => 'required|in:bank,crypto',
        'amount' => 'required|numeric|min:10',
        'currency' => 'nullable|string',
    ]);

    $user = Auth::user();
    $feePercent = 0.01;
    $minFee = 1.00;
    $amount = $request->amount;
    $fee = max($amount * $feePercent, $minFee);
    $reference = 'WD-' . strtoupper(Str::random(8));

    // Save withdrawal
    $withdrawal = Withdrawal::create([
        'user_id' => $user->id,
        'reference_id' => $reference,
        'method' => $request->method,
        'currency' => $request->method === 'crypto' ? $request->currency : null,
        'amount' => $amount,
        'fee' => $fee,
    ]);

    // Save transaction
    $transaction = new Transaction;
    $transaction->user_id = $user->id;
    $transaction->transaction_id = $reference;
    $transaction->transaction_type = "Debit";
    $transaction->transaction = "debit";
    $transaction->credit = "0";
    $transaction->debit = $amount;
    $transaction->status = 0; // pending
    $transaction->save();

    return response()->json([
        'success' => true,
        'referenceId' => $withdrawal->reference_id,
        'amount' => $withdrawal->amount,
        'fee' => $withdrawal->fee,
        'method' => $withdrawal->method,
        'currency' => $withdrawal->currency,
        'status' => $withdrawal->status,
    ]);
}



}
