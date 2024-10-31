

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Models\Category;
use App\Models\Recipe;
use App\Models\User;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // Fetch the recipes to pass to the view
    $recipes = Recipe::latest()->with('category', 'author')->get();

    return view('dashboard', [
        'recipes' => $recipes
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





// Route to display all recipes with categories
Route::get('/recipes', function () {
    // Eager load categories with recipes to reduce queries
    $recipes = Recipe::latest()->with('category','author')->get();

    return view('recipes', [
        'recipes' => $recipes
    ]);
});

// Route to display a single recipe
Route::get('recipes/{recipe}', function (Recipe $recipe) {
    if (!$recipe) {
        abort(404, 'Recipe not found');
    }

    return view('recipe', [
        'recipe' => $recipe
    ]);
});

// Route to display all recipes in a category
Route::get('categories/{category:slug}', function (Category $category) {
    // Load all recipes under the selected category with category details
    $recipes = $category->recipes()->with('category')->get();

    return view('recipes', [
        'recipes' => $recipes
    ]);
});


Route::get('authors/{author}', function (User $author) {  // Capitalize 'User'
    return view('recipes', [
        'recipes' => $author->recipes
    ]);
});