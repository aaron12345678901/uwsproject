<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\User;

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

//////////////////////////test build




// Route::get('/', function () {
   
//     return view('posts', [
//         'posts' => Post::latest()->with('category','author')->get()
//     ]);
// });

// Route::get('posts/{post}', function (Post $post) {
//     if (!$post) {
//         abort(404, 'Post not found');
//     }
//     return view('post', [
//         'post' => $post
//     ]);
// });

// Route::get('categories/{category:slug}', function (Category $category) {

//     return view('posts', [
//         'posts' => $category->posts->load(['category','author'])
//     ]);
// });



// Route::get('authors/{author}', function (User $author) {  // Capitalize 'User'
//     return view('posts', [
//         'posts' => $author->posts->load(['category','author'])
//     ]);
// });


//////////////////////////test build


////////////////recipe site 

// Define a route that responds to GET requests for 'recipes/{recipe}'
// {recipe} is a dynamic parameter that will be passed to the closure function





// Route to display the home page
Route::get('/', function () {
    return view('home');
});

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