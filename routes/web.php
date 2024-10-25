<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Recipe;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

//////////////////////////test build


// Route::get('/', function () {
//     $posts = Post::all();

//     return view('posts', [
//         'posts' => $posts
//     ]);
// });

// Route::get('posts/{post}', function ($id) {
//     $post = Post::find($id);

//     if (! $post) {
//         abort(404, 'Post not found');
//     }

//     return view('post', [
//         'post' => $post
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


// Route to display all recipes
Route::get('/recipes', function () {

    $recipes = Recipe::all();

    return view('recipes', [
        'recipes' => $recipes
    ]);
});


// Route to display a single recipe by slug
Route::get('recipes/{recipe}', function ($id) {
    $recipe = Recipe::find($id);

    if (! $recipe) {
        abort(404, 'Recipe not found');
    }

    return view('recipe', [
        'recipe' => $recipe
    ]);
});