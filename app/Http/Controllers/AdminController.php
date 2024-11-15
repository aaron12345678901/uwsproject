<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Method to show the admin dashboard
    public function index()
    {
        // Check if the authenticated user is an admin
        if (auth()->user()->is_admin != 1) {
            return redirect()->route('dashboard')->with('error', 'Access denied.');
        }

        // Get all users with their recipes
        $users = User::with('recipes')->get();
        return view('admin', compact('users'));
    }

    // Method to delete a user and their recipes
    public function destroy(User $user)
    {
        // Check if the authenticated user is an admin
        if (auth()->user()->is_admin != 1) {
            return redirect()->route('dashboard')->with('error', 'Access denied.');
        }

        // Delete the user's recipes and then the user
        $user->recipes()->delete();
        $user->delete();

        return redirect()->route('admin.dashboard')->with('status', 'User and their recipes deleted successfully.');
    }

    // Method to show a specific user's recipes
    public function showUserRecipes(User $user)
    {
        // Get the user's recipes with their categories
        $recipes = $user->recipes()->with('category')->get();
        $categories = Category::all();
        return view('user_recipes', compact('user', 'recipes', 'categories'));
    }

    // Method to update a recipe
    public function updateRecipe(Request $request, Recipe $recipe)
    {
        // Validate the incoming request data and update the recipe
        $recipe->update($request->validate([
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string',
            'body' => 'required|string',
        ]));

        return redirect()->route('admin.users.recipes', $recipe->author)
            ->with('status', 'Recipe updated successfully.');
    }
}