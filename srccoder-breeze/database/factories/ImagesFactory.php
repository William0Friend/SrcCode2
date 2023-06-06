<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Questions;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Images>
 */
class ImagesFactory extends Factory
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
            'file_path' => $this->faker->image('/var/www/html/uploads',640,480, null, false), //generates random non zero digit
            'file_name' => $this->faker->word(),
            'status' => $this->faker->randomElement(['active', 'inactive'])

        ];
    }
}
