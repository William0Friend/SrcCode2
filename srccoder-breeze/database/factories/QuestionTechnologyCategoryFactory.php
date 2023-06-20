<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\TechnologyCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuestionTechnologyCategory>
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
            'question_id' => Question::factory(),
            'technology_category_id' => TechnologyCategory::factory()
        ];
    }
}
