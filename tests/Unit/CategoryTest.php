<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testCategoryHasProjects()
    {
        $category = Category::factory()->create();
        $posts = Post::factory(5)->create([
            "category_id" => $category->id,
        ]);

        $category = Category::first();

        $this->assertNotNull($category->posts);
        $this->assertCount(5, $category->posts);
    }
}
