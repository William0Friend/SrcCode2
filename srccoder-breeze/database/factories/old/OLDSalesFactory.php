<?php

namespace Database\Factories;

use App\Models\Answers;
use App\Models\Bounties;
use App\Models\Questions;
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
            'question_id' => Questions::factory(),
            'answer_id' => Answers::factory(),
            'question_bounty_id' => Bounties::factory(),
            'tax_id' => $this->faker->unique()->randomDigitNotZero(),    // future implementation Tax::factory(),
            'amount' => $this->faker->unique()->randomFloat()
        ];
    }
}
