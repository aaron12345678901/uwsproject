<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//////////////////////////test build

Route::get('post/{post}', function ($post) {
    // Construct the path to the post file
    $path = __DIR__ . "/../resources/posts/{$post}.html";

    
// Check if the file exists
if (!file_exists($path)) {
   return redirect('/');
}

    // Get the contents of the post file
    $content = file_get_contents($path);

    // Return the view with the post content
    return view('post', [
        'post' => $content
    ]);
})->where('post','[A-z_\-]+');

//////////////////////////test build








//////






////////////////recipe site 

// Define a route that responds to GET requests for 'recipes/{recipe}'
// {recipe} is a dynamic parameter that will be passed to the closure function


Route::get('recipes/{recipe}', function ($recipe) {

    // Construct the file path to the corresponding HTML file in the resources/posts directory
    // The file name is based on the value of the {recipe} parameter


    $path = __DIR__ . "/../resources/posts/{$recipe}.html";

    // Check if the file exists at the constructed path
    // If the file doesn't exist, redirect the user to the homepage ('/')


    if (!file_exists($path)) {
        return redirect('/');
    }

    // If the file exists, retrieve its content using file_get_contents

    $content = file_get_contents($path);

    // Return a view called 'recipes', passing the file content as a variable named 'recipes'
    // This variable can then be accessed in the Blade view to display the content

    return view('recipes', [
        'recipes' => $content
    ]);

// Add a constraint to the route parameter {recipe} to only accept alphabetic characters (A-Z) and underscores or hyphens

})->where('recipe', '[A-z_\-]+');