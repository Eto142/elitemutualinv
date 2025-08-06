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


   return view('user.home');

}


public function UserProfile() {
    // Get the currently authenticated user
       
    return view('user.profile');

}

public function Transactions() {
    // Get the currently authenticated user
       
    return view('user.transactions');

}

public function Messages() {
    // Get the currently authenticated user
       
    return view('user.messages');

}


}
