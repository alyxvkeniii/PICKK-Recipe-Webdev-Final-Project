<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        // Ensure the authenticated user is an admin
        if (Auth::check() && Auth::user()->role == 1) {
            $users = User::all(); // Fetch all users
            return view('admin-users', ['users' => $users]); // Pass users to the view
        }

        // Redirect non-admin users
        return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
    }

    public function deleteUser($id)
    {
        // Find and delete the user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin-users')->with('success', 'User deleted successfully.');
    }
}

