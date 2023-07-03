<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bounty>
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
            // $table->foreignId('question_id')->constrained();
            // $table->foreignId('user_id')->constrained();
            // $table->integer('amount');
            // $table->boolean('status')->default(1); // 1 for open, 0 for closed
        
            'user_id' => User::factory(), //Generates a User from factory and extracts id
            'question_id' => Question::factory(), //Generates a Question from factory and extracts id
            'bounty'=> $this->faker->randomDigitNotZero(),
            'status'=> $this->faker->boolean()

        ];
    }
}
