<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AddRecipeController extends Controller
{
    public function store(Request $request)
    {
        try {
            Log::info('AddRecipeController: Store method called', [
                'user_id' => Auth::id(),
                'request_data' => $request->all()
            ]);
            Log::info('Request Data:', $request->all());

            // Validate incoming data
            $validator = Validator::make($request->all(), [
                'recipetitle' => 'required|string|max:255',
                'description' => 'required|string',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'ingredients' => 'nullable|string',
                'categories' => 'nullable|string',
                'instructions' => 'nullable|string', // Validate the instructions,
            ]);

            if ($validator->fails()) {
                Log::warning('AddRecipeController: Validation failed', [
                    'errors' => $validator->errors()->toArray()
                ]);
                return response()->json(['errors' => $validator->errors()], 400);
            }

            // Handle photo upload
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('recipe_photos', 'public');
                Log::info('AddRecipeController: Photo uploaded', [
                    'photo_path' => $photoPath
                ]);
            }

            // Save recipe
            $recipe = Recipe::create([
                'name' => $request->recipetitle,
                'description' => $request->description,
                'user_id' => Auth::id(),
                'image' => $photoPath,
                'ingredients' => $request->ingredients,
                'categories' => $request->category,
                'ratings' => 0,
                'status' => 'pending',
                'instructions' => $request->instructions, // Save the instructions
            ]);

            Log::info('AddRecipeController: Recipe saved successfully', [
                'recipe_id' => $recipe->id,
                'recipe_data' => $recipe->toArray()
            ]);

            return response()->json([
                'message' => 'Recipe added successfully!'
            ], 201);

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('AddRecipeController: Database error occurred', [
                'error_message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Database error occurred'], 500);

        } catch (\Exception $e) {
            Log::error('AddRecipeController: Unexpected error occurred', [
                'error_message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }
}
