<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SalesFactory extends Factory
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
            'question_user_id' => User::factory(),
            'answer_user_id' => User::factory(),
            'question_id' => Question::factory(),
            'answer_id' => Answer::factory(),
            'question_bounty_id' => Bounty::factory(),
            'tax_id' => $this->faker->randomDigitNotZero(),    // future implementation Tax::factory(),
            'amount' => $this->faker->randomFloat()
        ];
    }
}
