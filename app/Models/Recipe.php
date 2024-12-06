<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    // Allow all attributes to be mass assignable
    // protected $guarded = [];

    // Specify which attributes can be mass assigned
    protected $fillable = ['title', 'excerpt', 'body', 'image', 'category_id', 'user_id'];

    /**
     * Get the category that owns the recipe.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the author of the recipe.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}