<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Method to show the user's profile (display current profile information)
    public function show()
    {
        $user = Auth::user(); // Fetch the authenticated user
        return view('profile', compact('user')); // Pass the user to the view
    }

    // Method to update the user's profile information
    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user(); // Get the authenticated user
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
