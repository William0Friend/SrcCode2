<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Answer;
use App\Models\BlogPost;
use App\Models\Bounty;
use App\Models\Category;
use App\Models\Difficulty;
use App\Models\Post;
use App\Models\ProgrammingLanguage;
use App\Models\Question;
use App\Models\QuestionProgrammingLanguage;
use App\Models\QuestionTechnologyCategory;
use App\Models\Sales;
use App\Models\TechnologyCategory;
use App\Models\User;
use Database\Factories\SalesFactory;
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
        
        //video blog
        Post::factory(5)->create();
       
        // allow for specific user, 5 posts by same user, must go before post factory
        $user = User::factory()->create(
            [
                'name' => 'John Doe',
                'username' => 'johndoe',
                'email' => 'johndoe@example.com',
                'password' => 'password'
            ]
        );
        Post::factory(5)->create(
            [
                'user_id' => $user->id
            ]
        );
        //simple blog
        BlogPost::factory(5)->create();
        BlogPost::factory(5)->create(
            [
                'user_id' => $user->id
            ]
        );

        // //srccoder
        Question::factory(5)->create();
        Question::factory(5)->create(
            [
                'user_id' => $user->id
            ]
        );
        
        Answer::factory(5)->create();
        Answer::factory(5)->create(
             [
                 'user_id' => $user->id
             ]
         );

        Bounty::factory(5)->create();
        
        //Difficulty::factory(5)->create();
        
        // ProgrammingLanguage::factory(5)->create();

        // TechnologyCategory::factory(5)->create();
        QuestionProgrammingLanguage::factory(5)->create();
        QuestionTechnologyCategory::factory(5)->create();
        // Sales::factory(5)->create();
        // Sales::factory(5)->create(
        //     [
        //         'user_id' => $user->id
        //     ]
        // );
   
     }
}
