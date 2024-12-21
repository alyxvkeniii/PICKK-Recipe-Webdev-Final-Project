<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class MyrecipeController extends Controller
{
    public function getRecipesByUser()
    {
        $userId = Auth::id();
        // Retrieve recipes where user_id matches the provided ID
        $recipes = Recipe::where('user_id', $userId)->get();
    
        // Return the recipes using compact()
        return view('created', compact('recipes'));
    }
}
