<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\RecipeClass;


//////////////////////////test build


// Route::get('/', function () {
//     $posts = Post::all();

//     return view('posts', [
//         'posts' => $posts
//     ]);
// });


// Route::get('post/{post}', function ($slug) {
//     try {
//         $post = Post::find($slug);

//         return view('post', [
//             'post' => $post
//         ]);
//     } catch (ModelNotFoundException $e) {
//         return redirect('/')->withErrors(['message' => 'Post not found']);
//     }
// })->where('post', '[A-z_\-]+');









//////////////////////////test build















////////////////recipe site 

// Define a route that responds to GET requests for 'recipes/{recipe}'
// {recipe} is a dynamic parameter that will be passed to the closure function

// Route to display the home page with all posts
Route::get('/', function () {
    // Fetch all posts
    $posts = Post::all();

    return view('home', [
        'posts' => $posts // Pass the posts to the 'home' view
    ]);
});

// Route to display all recipes
Route::get('recipes', function () {
    // Fetch all recipes
    $recipes = RecipeClass::all();

    return view('recipes', [
        'recipes' => $recipes // Pass all recipes to the 'recipes' view
    ]);
});

// Additional route for viewing a specific post
Route::get('post/{post}', function ($slug) {
    try {
        // Attempt to find the post by slug
        $post = Post::find($slug);

        return view('post', [
            'post' => $post // Pass the post to the 'post' view
        ]);
    } catch (ModelNotFoundException $e) {
        return redirect('/')->withErrors(['message' => 'Post not found']);
    }
})->where('post', '[A-z_\-]+');