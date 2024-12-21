<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function favorites()
    {
        $user = auth()->user();
    
        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to log in to view your favorites.');
        }
    
        // Fetch the user's favorite recipes
        $favorites = $user->favorites; // This assumes the "favorites" pivot table is correct
    
        return view('favorites', compact('favorites'));
    }
    
}
