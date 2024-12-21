<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Favorite; // Import Favorite model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Recipe;

class DishController extends Controller
{
    public function showRecipe($recipeId)
    {
        // Query the database using Eloquent or Query Builder
        $recipe = DB::table('recipes')
                    ->where('id', $recipeId)
                    ->first();

        // Check if recipe exists
        if (!$recipe) {
            abort(404, 'Recipe not found');
        }

        // Fetch comments for the recipe
        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('users.username as username', 'comments.comment', 'comments.created_at')
            ->where('comments.recipe_id', $recipeId)
            ->orderBy('comments.created_at', 'desc')
            ->get();

        // Check if the recipe is favorited by the current user
        $isFavorited = Auth::check() && Favorite::where('user_id', Auth::id())->where('recipe_id', $recipeId)->exists();

        // Pass the data to the Blade view
        return view('dish', compact('recipe', 'comments', 'isFavorited'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the incoming request
            $validated = $request->validate([
                'recipe_id' => 'required|integer|exists:recipes,id',
                'comment' => 'required|string|max:65535',
            ]);

            // Create a new comment
            Comment::create([
                'recipe_id' => $validated['recipe_id'],
                'user_id' => Auth::id(),
                'comment' => $validated['comment'],
            ]);

            // Flash success message to the session
            session()->flash('success', 'Comment successfully added!');

            // Return the view (or redirect to the current page if needed)
            return back();
        } catch (\Exception $e) {
            // Flash error message to the session
            session()->flash('error', 'Failed to add comment. Please try again.');

            // Return the view (or redirect to the current page if needed)
            return back();
        }
    }

    public function addFavorite(Request $request)
    {
        $validated = $request->validate([
            'recipe_id' => 'required|exists:recipes,id',
        ]);

        $userId = Auth::id();
        $recipeId = $validated['recipe_id'];

        // Check if already favorited
        $existingFavorite = Favorite::where('user_id', $userId)->where('recipe_id', $recipeId)->first();

        if (!$existingFavorite) {
            Favorite::create([
                'user_id' => $userId,
                'recipe_id' => $recipeId,
            ]);

            return back()->with('success', 'Recipe added to favorites.');
        }

        return back()->with('info', 'Recipe is already in your favorites.');
    }

    public function removeFavorite(Request $request)
    {
        $validated = $request->validate([
            'recipe_id' => 'required|exists:recipes,id',
        ]);

        $userId = Auth::id();
        $recipeId = $validated['recipe_id'];

        Favorite::where('user_id', $userId)->where('recipe_id', $recipeId)->delete();

        return back()->with('success', 'Recipe removed from favorites.');
    }

    public function favorites()
    {
        // Get the authenticated user
        $user = auth()->user();
        
        // Ensure the user is logged in
        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to log in to view your favorites.');
        }
    
        // Fetch the user's favorite recipes
        $favorites = $user->favorites; // Assuming you have a favorites relationship on the User model
        
        // Return the favorites view and pass the data
        return view('favorites', compact('favorites'));
    }
}

