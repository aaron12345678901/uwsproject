<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class RecipeClass
{
    public $title;
    public $excerpt;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->slug = $slug;
    }

    // Method to retrieve all recipe files and return a collection
    public static function all()
    {
        $files = File::files(resource_path("recipes"));

        return collect($files)->map(function ($file) {
            $document = YamlFrontMatter::parseFile($file);

            return new RecipeClass(
                $document->title,
                $document->excerpt,
                $document->body(),
                $document->slug
            );
        });
    }

    // Method to find a specific recipe by slug
    public static function find($slug)
    {
        $recipes = static::all();

        // Use the firstWhere method to find the recipe by slug
        return $recipes->firstWhere('slug', $slug);
    }
}