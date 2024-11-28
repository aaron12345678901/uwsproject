<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Show the form for creating a new recipe.
     */
    public function create()
    {
        $categories = Category::all(); // Load categories for dropdown
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created recipe in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);
    
        // Attach the logged-in user as author
        $validated['user_id'] = auth()->id(); 
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            // Store image and get the path
            $imagePath = $request->file('image')->store('images', 'public'); // Store image
            $validated['image'] = $imagePath; // Store path in validated data
        }
    
        // Create the recipe in the database
        Recipe::create($validated);
    
        // Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Recipe added successfully!');
    }







    public function edit(Recipe $recipe)
    {
        // Ensure the recipe belongs to the authenticated user
        if ($recipe->user_id !== auth()->id()) {
            abort(403);
        }

        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified recipe in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        // Ensure the recipe belongs to the authenticated user
        if ($recipe->user_id !== auth()->id()) {
            abort(403);  // Forbidden if the recipe doesn't belong to the current user
        }
    
        // Validate the data
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
    
        // Update the recipe
        $recipe->update($request->only('title', 'body'));
    
        // Redirect back to the profile edit page with a success message
        return redirect()->route('profile.edit')
            ->with('status', 'Recipe updated successfully!');
    }

    
}