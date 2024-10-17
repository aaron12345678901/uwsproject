<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    // Method to retrieve all post files
    public static function all()
    {
        $files = File::files(resource_path("posts"));

        // Map over the files and return their contents
        return array_map(function($file) {
            return file_get_contents($file);
        }, $files);
    }

    // Method to find a specific post by slug
    public static function find($slug)
    {
        $path = resource_path("posts/{$slug}.html");

        if (!file_exists($path)) {
            throw new ModelNotFoundException();
        }

        return cache()->remember("post.{$slug}", 1200, fn() => file_get_contents($path));
    }
}