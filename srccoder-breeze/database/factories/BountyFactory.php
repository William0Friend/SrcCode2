<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BountyFactory extends Factory
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
            'user_id' => User::factory(), //Generates a User from factory and extracts id
            'question_id' => Question::factory(), //Generates a Question from factory and extracts id
            'amount' => $this->faker->randomDigitNotZero() //generates random non zero digit
        ];
    }
}
