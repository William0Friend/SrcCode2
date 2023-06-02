<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
        ]);

        Category::create([
            'name' => 'Vue.js',
            'slug' => 'vue-js',
        ]);

        Category::create([
            'name' => 'CSS',
            'slug' => 'css',
        ]);

        Category::create([
            'name' => 'JavaScript',
            'slug' => 'javascript',
        ]);

        Post::create([
            'title' => 'My first post',
            'category_id' => 1,//'category_id' => Category::all()->random()->id,
            'slug' => 'my-first-post',
            'excerpt' => '<p>Lorem ipsum dolor</p>',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>',
        ]);

        Post::create([
            'title' => 'My second post',
            'category_id' => 2,//'category_id' => Category::all()->random()->id,
            'slug' => 'my-second-post',
            'excerpt' => '<p>Lorem ipsum dolor</p>',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>',
        ]);

        Post::create([
            'title' => 'My third post',
            'category_id' => 3,//'category_id' => Category::all()->random()->id,
            'slug' => 'my-third-post',
            'excerpt' => '<p>Lorem ipsum dolor</p>',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>',
        ]);
    }
}
