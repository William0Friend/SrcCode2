<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\User;
use \App\Database\Factories\UserFactory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
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
            'title' => $this->faker->sentence, //Generates a fake sentence
            'body' => $this->faker->paragraph(30), //generates fake 30 paragraphs
            'user_id' => User::factory(), //Generates a User from factory and extracts id, // user_id of our question
            'bounty_id' => Bounty::factory(), //Generates a Bounty from factory and extracts id
            'programming_language_id' => ProgrammingLanguage::factory(), //Generates a ProgrammingLanguage from factory and extracts id
            'technology_category_id' => TechnologyCatagory::factory(), //Generates a TechnologyCatagory from factory and extracts id
            'slug' => $this->faker->slug()//slug is a url friendly version of the title
//            'is_answered' => $this->faker->boolean(), //generates random boolean
        ];
    }
}
