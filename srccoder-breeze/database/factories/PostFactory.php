<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 * implode turns the two arrays returned by faker into a string
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // protected $model = Post::class;
    public function definition(): array
    {
        return [
            //
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->unique()->sentence(),
            'slug' => $this->faker->unique()->slug(),
            'excerpt' => '<p>' . implode('</p><p>' , $this->faker->unique()->paragraphs(2)) . '</p>' ,
            'body' => '<p>' . implode('</p><p>' , $this->faker->unique()->paragraphs(6)) . '</p>'
            
        ];
    }
}
