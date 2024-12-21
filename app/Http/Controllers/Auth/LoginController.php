<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |----------------------------------------------------------------------
    | Login Controller
    |----------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to the appropriate dashboard based on their role.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Override the default redirection based on user role after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        $user = Auth::user();

        // Check if the user is an admin (role 1)
        if ($user && $user->role == 1) {
            return route('admin'); // Redirect to the admin dashboard
        }

        // Otherwise, redirect to the regular user dashboard
        return route('dashboard');
    }
}