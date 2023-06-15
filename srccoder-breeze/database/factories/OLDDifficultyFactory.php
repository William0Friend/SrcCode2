<?php

namespace Database\Factories;

use App\Models\Questions;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Difficulty>
 */
class DifficultyFactory extends Factory
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
            'question_id' => Questions::factory(), //Generates a Question from factory and extracts id
            'difficulty' => $this->faker->randomElements(['easy', 'medium', 'hard', 'No Idea']) //generates random non zero digit
        ];
    }
}
