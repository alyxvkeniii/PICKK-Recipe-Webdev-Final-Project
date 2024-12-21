<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|in:0,1',
        ]);

        $user->update($request->all());

        return redirect()->route('admin')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
{
    $user->delete();

    return redirect()->route('admin')->with('success', 'User deleted successfully.');
}
}