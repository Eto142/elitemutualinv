<?php

namespace App\Http\Controllers\User;

use App\Models\Deposit;
use App\Models\LoanApplication;
use App\Models\Transaction;
use App\Models\Credit;
use App\Models\Debit;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    //
       //display user dashboard
 public function index()
{
    $query = Transaction::where('user_id', Auth::id());
    $transactions = $query->orderBy('id', 'desc')->paginate(10);

    return view('user.home', compact('transactions'));
}


public function UserProfile() {
    // Get the currently authenticated user
       
    return view('user.profile');

}


public function updateProfile(Request $request)
{
    $request->validate([
        'first_name' => 'nullable|string|max:100',
        'last_name' => 'nullable|string|max:100',
        'phone' => 'nullable|string|max:20',
        'dob' => 'nullable|date',
        'gender' => 'nullable|in:male,female,other',
        'country' => 'nullable|string|max:100',
        'state' => 'nullable|string|max:100',
    ]);

    $user = Auth::user();

    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->phone = $request->phone;
    $user->dob = $request->dob;
    $user->gender = $request->gender;
    $user->country = $request->country;
    $user->state = $request->state;
    
    $user->save();

    return back()->with('success', 'Profile updated successfully!');

}



public function Transactions(Request $request)
{
    $query = Transaction::where('user_id', Auth::id());

    // Apply filters
    if ($request->filled('from')) {
        $query->whereDate('created_at', '>=', $request->from);
    }

    if ($request->filled('to')) {
        $query->whereDate('created_at', '<=', $request->to);
    }

    if ($request->type && $request->type != 'all') {
        $query->where('transaction', $request->type);
    }

    if ($request->status != null && $request->status != 'all') {
        if ($request->status == 'completed') {
            $query->where('status', 1);
        } elseif ($request->status == 'pending') {
            $query->where('status', 0);
        } elseif ($request->status == 'failed') {
            $query->where('status', 2);
        }
    }

    $transactions = $query->orderBy('id', 'desc')->paginate(10);

    return view('user.transactions', compact('transactions'));
}





}
