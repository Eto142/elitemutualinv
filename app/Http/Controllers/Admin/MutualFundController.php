<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\MutualFund;
use App\Models\Transaction;

class MutualFundController extends Controller
{
    /**
     * Add a new mutual fund investment for a user (approved immediately).
     */
    public function AddUserMutualFund(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'id'        => 'required|exists:users,id',
            'fund_name' => 'required|string|in:growth,balanced,income',
            'amount'    => 'required|numeric|min:1',
            'date'      => 'required|date',
        ]);

        // Find user
        $user = User::findOrFail($validated['id']);

        // Generate reference IDs
        $referenceId   = 'MF-' . strtoupper(Str::random(8));
        $transactionId = strtoupper(Str::random(12));

        // Create Mutual Fund record (approved immediately)
        $mutualFund = new MutualFund();
        $mutualFund->user_id      = $user->id;
        $mutualFund->fund_name    = $validated['fund_name'];
        $mutualFund->amount       = $validated['amount'];
        $mutualFund->status       = 1; // ✅ Approved
        $mutualFund->reference_id = $referenceId;
        $mutualFund->date         = $validated['date'];
        $mutualFund->save();

        // Create Transaction (approved immediately)
        $transaction = new Transaction();
        $transaction->user_id          = $user->id;
        $transaction->transaction_id   = $transactionId;
        $transaction->transaction_type = "Credit";
        $transaction->transaction      = "Mutual Fund - " . ucfirst($validated['fund_name']);
        $transaction->credit           = $validated['amount'];
        $transaction->debit            = 0;
        $transaction->status           = 1; // ✅ Approved
        $transaction->save();

        return redirect()->back()->with('success', 'Mutual Fund successfully added and approved.');
    }
}
