<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory\App\Models\Answer
 */
class AnswerFactory extends Factory
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
            'body' => $this->faker->paragraph(30), //generates fake 30 paragraphs
            'user_id' => User::factory(), //Generates a User from factory and extracts id
            'question_id' => Question::factory(), //Generates a Question from factory and extracts id
            'code_body' => $this->faker->paragraph(30), //generates fake 30 paragraphs
            'slug' => $this->faker->slug()//slug is a url friendly version of the title

        ];
    }
}
