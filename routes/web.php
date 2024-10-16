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