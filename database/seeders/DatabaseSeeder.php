<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Mail;
use App\Models\Post;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use NunoMaduro\Collision\ConsoleColor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        User::factory()->create(["email" => "admin@site.test"]);

        Mail::factory(15)->create();

        Project::factory(9)->create();

        $categories = Category::factory(2)
            ->sequence(
                ["title" => "news", "slug" => "news"],
                ["title" => "tutorials", "slug" => "tutorials"]
            )
            ->create();
        $categories->each(function (Category $category) {
            Post::factory(random_int(15, 35))->create([
                "category_id" => $category->id,
            ]);
        });

        DB::commit();
    }
}
