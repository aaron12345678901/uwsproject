<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class RecipeClass
{
    // Method to retrieve all recipe files
    public static function all()
    {
        $files = File::files(resource_path("recipes"));

        // Map over the files and return their contents
        return array_map(function($file) {
            return file_get_contents($file);
        }, $files);
    }

    // Method to find a specific recipe by slug
    public static function find($slug)
    {
        $path = resource_path("recipes/{$slug}.html");

        if (!file_exists($path)) {
            throw new ModelNotFoundException();
        }

        return cache()->remember("recipe.{$slug}", 1200, fn() => file_get_contents($path));
    }
}