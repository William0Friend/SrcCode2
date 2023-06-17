<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
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

            'note' => $this->faker->paragraph(), //generates fake 30 paragraphs
            'user_id' => User::factory(), //Generates a User from factory and extracts id
            'question_id' => Question::factory(), //Generates a Question from factory and extracts id
            'code_body' => $this->faker->paragraph(), //generates fake 30 paragraphs
            'slug' => $this->faker->unique()->slug()//slug is a url friendly version of the title

        ];
    }
}