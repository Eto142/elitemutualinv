<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profit;
use App\Models\Transaction;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfitController extends Controller
{
    //

public function AddUserProfit(Request $request)
{
    // Validate incoming request
    $validated = $request->validate([
        'id'          => 'required|exists:users,id',
        'amount'      => 'required|numeric',
        'profit_date' => 'required|date',
    ]);

    // Find user
    $user = User::findOrFail($validated['id']);

    // Generate Transaction ID
    $transactionId = strtoupper(Str::random(12));

    // Create Profit record
    $profit = new Profit();
    $profit->user_id    = $user->id;
    $profit->amount     = $validated['amount'];
    $profit->created_at = $validated['profit_date']; // ✅ Corrected
    $profit->save();

    // Create Transaction record
    $transaction = new Transaction();
    $transaction->user_id          = $user->id;
    $transaction->transaction_id   = $transactionId;
    $transaction->transaction_type = "Credit";
    $transaction->transaction      = "credit";
    $transaction->credit           = $validated['amount'];
    $transaction->debit            = 0;
    $transaction->status           = 1; // Approved
    $transaction->created_at       = $validated['profit_date']; // ✅ Corrected
    $transaction->save();

    return redirect()->back()->with('success', 'Profit successfully added.');
}



}
