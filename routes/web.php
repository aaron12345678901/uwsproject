<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\User;

// Route for the homepage, loading the 'welcome' view
Route::get('/', function () {
    return view('welcome');
});

// Route for the dashboard page, retrieving the latest recipes with their category and author
// Only accessible to authenticated and verified users
Route::get('/dashboard', function () {
    $search = request('search'); // Retrieve the search query parameter
    $recipes = Recipe::latest()
        ->with('category', 'author')
        ->when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })
        ->get();
    return view('dashboard', ['recipes' => $recipes, 'search' => $search]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Group of routes that require user authentication
Route::middleware('auth')->group(function () {
    // Route to edit the user profile, handled by ProfileController's 'edit' method
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // Route to update the user profile, handled by ProfileController's 'update' method
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Route to delete the user profile, handled by ProfileController's 'destroy' method
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Load authentication routes (e.g., login, register, password reset)
require __DIR__.'/auth.php';

// Route to view all recipes, retrieving the latest recipes with their category and author
Route::get('/recipes', function () {
    $recipes = Recipe::latest()->with('category', 'author')->get();
    return view('recipes', ['recipes' => $recipes]);
});

// Route to view a single recipe by ID, loading the 'recipe' view
Route::get('recipes/{recipe}', function (Recipe $recipe) {
    return view('recipe', ['recipe' => $recipe]);
});

// Route to view all recipes within a specific category (identified by slug)
Route::get('categories/{category:slug}', function (Category $category) {
    $recipes = $category->recipes()->with('category')->get();
    return view('recipes', ['recipes' => $recipes]);
});

// Route to view all recipes by a specific author
Route::get('authors/{author}', function (User $author) {
    return view('recipes', ['recipes' => $author->recipes]);
});

// Route to the recipe creation form, accessible only to authenticated users
Route::get('/dashboard/create', [RecipeController::class, 'create'])->middleware('auth')->name('recipes.create');

// Route to store a new recipe, accessible only to authenticated users
Route::post('/dashboard/recipes', [RecipeController::class, 'store'])->middleware('auth')->name('recipes.store');

// Group of routes for admin-specific functionalities, requiring authentication and verification
Route::middleware(['auth', 'verified'])->group(function () {
    // Route to the admin dashboard, handled by AdminController's 'index' method
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Route to delete a user, handled by AdminController's 'destroy' method
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
    
    // Route to view a specific user's recipes, handled by AdminController's 'showUserRecipes' method
    Route::get('/admin/users/{user}/recipes', [AdminController::class, 'showUserRecipes'])->name('admin.users.recipes');
    
    // Route to update a specific recipe, handled by AdminController's 'updateRecipe' method
    Route::put('/admin/recipes/{recipe}', [AdminController::class, 'updateRecipe'])->name('admin.recipes.update');
});

// Route to the 'public-dashboard' page for unauthenticated users to view basic content
Route::get('/public-dashboard', function () {
    $search = request('search');
    $recipes = Recipe::latest()
        ->with('category', 'author')
        ->when($search, function ($query) use ($search) {
            $query->where('title', 'like', "%{$search}%");
        })
        ->get();
    return view('public-dashboard', ['recipes' => $recipes]);
})->name('public_dashboard');

// Route for admin to delete a single recipe
Route::delete('/admin/recipes/{recipe}', [AdminController::class, 'destroyRecipe'])->name('admin.recipes.destroy');

// Routes for editing and updating recipes
Route::middleware(['auth'])->group(function () {
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
});

// Route to delete a specific recipe
Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->middleware('auth')->name('recipes.destroy');
