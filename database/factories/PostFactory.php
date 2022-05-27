<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        return [
            "category_id" => fn() => Category::factory()->create(),
            "title" => $title,
            "slug" => Str::slug($title),
            // "img" => "https://images.test/posts/" . random_int(1, 15) . ".jpg",
            'img' => 'https://aboadel-portfolio.herokuapp.com/laravel-logo.png',
            "body" => $this->faker->randomHtml(8, 8),
        ];
    }
}
