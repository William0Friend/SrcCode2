<?php

namespace Database\Factories;

use App\Models\ProgrammingLanguage;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuestionProgrammingLanguage>
 */
class QuestionProgrammingLanguageFactory extends Factory
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
            'programming_language_id' => ProgrammingLanguage::factory()
        ];
    }
}
