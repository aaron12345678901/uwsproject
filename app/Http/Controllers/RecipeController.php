<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function create()
    {
        $categories = Category::all(); // Load categories for dropdown
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);
    
        $validated['user_id'] = auth()->id(); // Attach the logged-in user as author
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Store image
            $validated['image'] = $imagePath; // Store path in validated data
        }
    
        Recipe::create($validated);
    
        return redirect()->route('dashboard')->with('success', 'Recipe added successfully!');
    }
}