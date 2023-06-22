<?php

namespace Database\Factories;

use App\Models\Bounty;
use App\Models\Difficulty;
use App\Models\User;
use App\Models\ProgrammingLanguage;
use App\Models\TechnologyCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => $this->faker->sentence, //Generates a fake sentence
            'body' => $this->faker->paragraph(30), //generates fake 30 paragraphs
            'user_id' => User::factory(), //Generates a User from factory and extracts id, // user_id of our question
            'slug' => $this->faker->unique()->slug()//slug is a url friendly version of the title
//            'is_answered' => $this->faker->boolean(), //generates random boolean
        ];
    }
}
