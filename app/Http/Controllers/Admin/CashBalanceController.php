<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\CashBalance;
use App\Models\Transaction;

class CashBalanceController extends Controller
{
    /**
     * Add a new mutual fund investment for a user (approved immediately).
     */
    public function AddUserCashBalance(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'id'        => 'required|exists:users,id',
            'amount'    => 'required|numeric|min:1',
            'description'    => 'required|string|',
            'date'      => 'required|date',
        ]);

        // Find user
        $user = User::findOrFail($validated['id']);

        // Generate reference IDs
        $referenceId   = 'MF-' . strtoupper(Str::random(8));
        $transactionId = strtoupper(Str::random(12));

        // Create Mutual Fund record (approved immediately)
        $CashBalance = new CashBalance();
        $CashBalance->user_id      = $user->id;
        $CashBalance->amount       = $validated['amount'];
        $CashBalance->description    = $validated['description'];
        $CashBalance->status       = 1; // ✅ Approved
        $CashBalance->reference_id = $referenceId;
        $CashBalance->date         = $validated['date'];
        $CashBalance->save();

        // Create Transaction (approved immediately)
        $transaction = new Transaction();
        $transaction->user_id          = $user->id;
        $transaction->transaction_id   = $transactionId;
        $transaction->transaction_type = "Credit";
        $transaction->transaction      = "Cash Balance - " . ucfirst($validated['description']);
        $transaction->credit           = $validated['amount'];
        $transaction->debit            = 0;
        $transaction->status           = 1; // ✅ Approved
        $transaction->save();

        return redirect()->back()->with('success', 'Cash Balance successfully added and approved.');
    }
}
