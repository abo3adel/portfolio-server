<?php

namespace Database\Factories;

use App\Http\Types\ProjectType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
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
            "title" => $title,
            "slug" => Str::slug($title),
            "link" => $this->faker->url,
            "type" => Arr::random(ProjectType::values(), 1)[0],
            "img" => "https://images.test/posts/" . random_int(1, 15) . ".jpg",
            "download_url" => $this->faker->boolean ? $this->faker->url : null,
            "shots" => [
                "https://images.test/posts/" . random_int(1, 15) . ".jpg",
                "https://images.test/posts/" . random_int(1, 15) . ".jpg",
                "https://images.test/posts/" . random_int(1, 15) . ".jpg",
            ],
            "tags" => Arr::random(
                [
                    "Full Stack",
                    "api",
                    "lumen",
                    "ionic",
                    "flutter",
                    "vueJs",
                    "hasApi",
                ],
                2
            ),
        ];
    }
}
