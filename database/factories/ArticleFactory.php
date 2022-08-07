<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(6),
            'description' => $this->faker->text(50),
            'content' => $this->faker->text(50),
            'image' => $this->faker->imageUrl,
            'likes' => random_int(0, 300),
            'is_published' => 1,
            'category_id' => Category::get()->random()->id
        ];
    }
}
