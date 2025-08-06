<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //
    public function showRegistrationForm() {

        return view('auth.register');
    }



public function register(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'phone'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
            'email'      => $request->input('email'),
            'phone'      => $request->input('phone'),
            'password'   => bcrypt($request->input('password')),
        ]);

        Auth::login($user); // Optional: remove if you don’t want auto-login

        return response()->json([
            'message' => 'Registration successful!',
            'redirect' => route('login') // or use route('login') if you're not auto-logging in
        ], 200);

    } catch (\Throwable $e) {
        \Log::error('Registration error: ' . $e->getMessage());

        return response()->json([
            'error' => 'Something went wrong. Please try again later.',
            'details' => config('app.debug') ? $e->getMessage() : null
        ], 500);
    }
}



}
