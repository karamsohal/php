<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoriesIds = \App\Models\Category::pluck('id')->all();
        $authorIds = \App\Models\User::pluck('id')->all();
        return [
            'created_at' => now(),
            'updated_at' => now(),
            'name' => fake()->sentence,
            'body' => fake()->sentence,
            'category_id' => fake()->randomElement($categoriesIds),
            'author_id' => fake()->randomElement($authorIds)
        ];
    }
}
