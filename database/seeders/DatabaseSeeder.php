<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Post;
use App\Models\Recipe;

use App\Models\User;
use Exception;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         



   
            //    Post::factory(10)->create();

             Recipe::factory(10)->create();


 



    }
}
