<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\Recipe;

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

//////////////////////////test build


Route::get('/', function () {
    $posts = Post::all();

    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('posts/{post}', function (Post $post) {
    

    if (! $post) {
        abort(404, 'Post not found');
    }

    return view('post', [
        'post' => $post
    ]);
});





Route::get('categories/{category:slug}', function (Category $category) {
    
    return view('posts', [
        'posts' => $category->posts
    ]);

});


//////////////////////////test build


////////////////recipe site 

// Define a route that responds to GET requests for 'recipes/{recipe}'
// {recipe} is a dynamic parameter that will be passed to the closure function





// // Route to display the home page
// Route::get('/', function () {
//     return view('home');
// });


// // Route to display all recipes
// Route::get('/recipes', function () {

//     $recipes = Recipe::all();

//     return view('recipes', [
//         'recipes' => $recipes
//     ]);
// });


// // Route to display a single recipe 
// Route::get('recipes/{recipe}', function (recipe $recipe) {
   

//     if (! $recipe) {
//         abort(404, 'Recipe not found');
//     }

//     return view('recipe', [
//         'recipe' => $recipe
//     ]);
// });


// // // Route to display all in a category
// Route::get('categories/{category:slug}', function (Category $category) {
    
//     return view('recipes', [
//         'recipes' => $category->recipes
//     ]);

// });