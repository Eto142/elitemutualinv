<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\User\WithdrawalController;
use Illuminate\Support\Facades\Route;







Route::get('/', function () {
    return view('home.homepage');
});

Route::get('/fixed-deposit', function () {
    return view('home.fixed-deposit');
});

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Logout Route
Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('user.logout');



Route::prefix('user')->as('user.')->middleware('auth')->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home'); // user.home
    Route::get('/alltransactions', [DashboardController::class, 'Alltransactions'])->name('transactions'); // user.transactions
    Route::get('/apply', [DashboardController::class, 'ApplyLoan'])->name('apply'); // user.alert
    Route::get('/setting', [DashboardController::class, 'Setting'])->name('setting'); // user.setting
    Route::get('/help', [DashboardController::class, 'HelpCenter'])->name('help'); // user.help
     Route::get('/messages', [DashboardController::class, 'Messages'])->name('messages'); // user.message
    Route::get('/profile', [DashboardController::class, 'UserProfile'])->name('profile'); // user.message
    Route::post('/update-setting', [DashboardController::class, 'updateSettings'])->name('settings'); // user.settings
 Route::get('/transactions', [DashboardController::class, 'Transactions'])->name('transactions'); // user.message
  Route::get('/deposit', [DepositController::class, 'index'])->name('deposit'); // user.message
  
  Route::get('/fixed-deposit', [DepositController::class, 'FixedDeposit'])->name('fixed.deposit'); // user.message
   Route::get('/mutual-funds', [DepositController::class, 'MutualFunds'])->name('mutual.funds'); // user.message

      Route::get('/withdrawal', [WithdrawalController::class, 'index'])->name('withdrawal'); // user.message
});