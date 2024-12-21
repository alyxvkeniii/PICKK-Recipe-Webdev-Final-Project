<?php

namespace App\Http\Controllers;

use App\Models\Recipe;

class AllRecipeController extends Controller
{
    public function index()
    {
        // Fetch only approved recipes
        $recipes = Recipe::where('status', 'approved')->get();

        // Ensure that $recipes is an empty collection if no recipes are found
        if ($recipes->isEmpty()) {
            $recipes = collect(); // Empty collection if no approved recipes
        }

        // Pass the $recipes variable to the view
        return view('my-recipe', compact('recipes'));
    }
}
