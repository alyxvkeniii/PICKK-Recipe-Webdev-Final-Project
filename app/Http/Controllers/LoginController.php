<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        // Validate login credentials
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        // Check if the credentials match any entry in the login table
        $user = \DB::table('users')->where('email', $request->email)->first();

        if ($user && \Hash::check($request->password, $user->password)) {
            // Successful login
            return redirect()->intended('/dashboard');
        }
        // Failure to login
        return back()->withErrors(['email' => 'Wrong Email or Password'])->withInput();
    }

    public function showSignUpForm()
    {
        return view('sign-up');
    }

    public function signUp(Request $request)
    {
        // Validate the incoming data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:users,email',
            'username' => 'required|max:255|unique:users,username', // Updated to 'username'
            'password' => 'required|min:5|confirmed',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('sign-up')->withErrors($validator)->withInput();
        }

        // $user_id = Auth::id;    

        // Insert the new user into the database
        \DB::table('users')->insert([
            'email' => $request->email,
            'username' => $request->username,
            'role' => 'user',
            // 'user_id' => $user_id
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),
            'type' => 0, // Use an integer value instead of 'regular'
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect('/login')->with('success', 'Account created successfully!');
    }
    
}