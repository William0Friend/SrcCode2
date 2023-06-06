<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //clear out all data avoid duplicates and migrate fresh
       // User::truncate();
       // Category::truncate();
       // Post::truncate();
        

        Post::factory(5)->create();
       
        // allow for specific user, 5 posts by same user, must go before post factory
        $user = User::factory()->create(
            [
                'name' => 'John Doe'
            ]
        );
        Post::factory(5)->create(
            [
                'user_id' => $user->id
            ]
        );
      
        // Post::factory(5)->create();
       
      //??MAUAL TESTING WAY
        //\App\Models\User::factory(10)->create();
    //      $user = User::factory()->create();//User::factory(10)->create();
    //     // \App\Models\User::factory()->create([
    //     //     'name' => 'Test User',
    //     //     'email' => 'test@example.com',
    //     // ]);

    //     // Category::create([
    //     //     'name' => 'Laravel',
    //     //     'slug' => 'laravel',
    //     // ]);

    //     $personal = Category::create([
    //         'name' => 'Personal',
    //         'slug' => 'personal',
    //     ]);

    //     $work = Category::create([
    //         'name' => 'Work',
    //         'slug' => 'work',
    //     ]);

    //     $hobbies = Category::create([
    //         'name' => 'Hobbies',
    //         'slug' => 'hobbies',
    //     ]);

    //     Post::create([
    //         'title' => 'first personal post',
    //         'user_id' => $user->id,//'user_id' => User::all()->random()->id, or $user->id
    //        'category_id' => $personal->id,//'category_id' => Category::all()->random()->id, or $family->id, $work->id, $hobbies->id
    //        'slug' => 'first-personal-post',
    //         'excerpt' => '<p>Lorem ipsum dolor</p>',
    //         'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>',
    //     ]);

    //     Post::create([
    //         'title' => 'second family post',
    //         'user_id' => $user->id,//'user_id' => User::all()->random()->id,
    //       'category_id' => $personal->id,//'category_id' => Category::all()->random()->id,
    //        'slug' => 'second-personal-post',
    //         'excerpt' => '<p>Lorem ipsum dolor</p>',
    //         'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>',
    //     ]);

    //     Post::create([
    //         'title' => 'first work post',
    //         'user_id' => $user->id,//'user_id' => User::all()->random()->id,
    //      'category_id' =>$work->id,//'category_id' => Category::all()->random()->id,
    //        'slug' => 'first-work-post',
    //         'excerpt' => '<p>Lorem ipsum dolor</p>',
    //         'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>',
    //     ]);

    //     Post::create([
    //         'title' => 'second work post',
    //         'user_id' => $user->id,//'user_id' => User::all()->random()->id,
    //        'category_id' => $work->id,//'category_id' => Category::all()->random()->id,
    //        'slug' => 'second-work-post',
    //         'excerpt' => '<p>Lorem ipsum dolor</p>',
    //         'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>',
    //     ]);

    //     Post::create([
    //         'title' => 'first hobbies post',
    //         'user_id' => $user->id,//'user_id' => User::all()->random()->id,
    //         'category_id' => $hobbies->id,//'category_id' => Category::all()->random()->id,
    //         'slug' => 'first-hobbies-post',
    //         'excerpt' => '<p>Lorem ipsum dolor</p>',
    //         'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>',
    //     ]);

    //     Post::create([
    //         'title' => 'second hobbies post',
    //         'user_id' => $user->id,//'user_id' => User::all()->random()->id,
    //         'category_id' => $hobbies->id,//'category_id' => Category::all()->random()->id,
    //         'slug' => 'second-hobbies-post',
    //         'excerpt' => '<p>Lorem ipsum dolor</p>',
    //         'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>',
    //     ]);
     }
}
