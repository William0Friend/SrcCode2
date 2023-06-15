<?php

namespace Database\Factories;

use App\Models\Questions;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BountiesFactory extends Factory
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
            'question_id' => $this->faker->randomDigitNotZero(), //might be cause of endless loop Questions::factory(), //Generates a Question from factory and extracts id
            'amount' => $this->faker->randomDigitNotZero() //generates random non zero digit
        ];
    }
}
