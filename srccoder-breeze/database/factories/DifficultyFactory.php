<?php

namespace Database\Factories;

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
            'question_id' => Question::factory(), //Generates a Question from factory and extracts id
            'difficulty' => $this->faker->randomElements(['easy', 'medium', 'hard', 'No Idea']) //generates random non zero digit
        ];
    }
}
