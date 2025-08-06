<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    //

     public function index(){

   return view('user.deposit.index');
}

public function FixedDeposit(){
  return view('user.fixed-deposit');  
}

public function MutualFunds(){
  return view('user.mutual-funds');  
}


}
