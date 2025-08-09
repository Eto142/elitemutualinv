<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class DepositController extends Controller
{
    

     public function usersDeposit(){

        $user_deposits = Deposit::where('user_id', auth()->id())
                                  ->orderBy('created_at', 'desc')
                                  ->paginate(10); // or whatever number you prefer
        return view('admin.manage_deposit', compact('user_deposits'));
    }






  public function AddUserDeposit(Request $request)
{
    // Validate incoming request
    $validated = $request->validate([
        'id'           => 'required|exists:users,id',
        'amount'       => 'required|numeric',
        'method'       => 'required|string',
        'deposit_date' => 'required|date',
    ]);

    // Find user
    $user = User::findOrFail($validated['id']);

    // Generate IDs
    $referenceId   = 'DEP-' . strtoupper(Str::random(8));
    $transactionId = strtoupper(Str::random(12));

    // Create Deposit (approved immediately)
    $deposit = new Deposit();
    $deposit->user_id      = $user->id;
    $deposit->method       = $validated['method'];
    $deposit->amount       = $validated['amount'];
    $deposit->status       = 1; // ✅ Approved
    $deposit->reference_id = $referenceId;
    $deposit->created_at   = $validated['deposit_date'];
    $deposit->save();

    // Create Transaction (approved immediately)
    $transaction = new Transaction();
    $transaction->user_id          = $user->id;
    $transaction->transaction_id   = $transactionId;
    $transaction->transaction_type = "Credit";
    $transaction->transaction      = "credit";
    $transaction->credit           = $validated['amount'];
    $transaction->debit            = 0;
    $transaction->status           = 1; // ✅ Approved
    $transaction->save();

    return redirect()->back()->with('success', 'Deposit successfully added and approved.');
}



    
    public function approveDeposit(Request $request, $id)
{
    // Get the deposit with the given ID
    $deposit = Deposit::findOrFail($id);

    // Update the status of the deposit
    $deposit->status = 1;
    $deposit->save();

    // Update the status of the corresponding transaction
    Transaction::where('transaction_id', $deposit->transaction_id)->update(['status' => 1]);

     $email = $deposit->email; 
     $amount = $deposit->amount;
     $deposit_type = $deposit->deposit_type;

   $data = "Your check has been approved successfully!";

//    Mail::to($email)->send(new approveDepositEmail($data));
    return redirect()->back()->with('message', 'Your check Has Been Approved Successfully');
}




public function DeclineDeposit(Request $request, $id)
{
    // Get the deposit with the given ID
    $deposit = Deposit::findOrFail($id);

    // Update the status of the deposit
    $deposit->status = 2;
    $deposit->save();

    // Update the status of the corresponding transaction
    Transaction::where('transaction_id', $deposit->transaction_id)->update(['status' => 2]);
     $email = $deposit->email; 
     $amount = $deposit->amount;
     $reason = $deposit->reason;
    

    $data = "Your $" . $amount ." check has been declined!";

    // Mail::to($email)->send(new declineDepositEmail($data));
    return redirect()->back()->with('message', 'Deposit Has Been Declined Successfully');
}
}
