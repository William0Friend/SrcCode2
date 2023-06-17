<?php

namespace Database\Factories;

use App\Models\Questions;
use App\Models\TechnologyCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuestionTechnologyCategoryFactory extends Factory
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
            'technology_category_id' => TechnologyCategory::factory() //Generates a TechnologyCategory from factory and extracts id

        ];
    }
}
