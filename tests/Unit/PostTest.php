<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testPostHasCategory()
    {
        $category = Category::factory()->create();
        $post = Post::factory()->create([
            "category_id" => $category->id,
        ]);

        $post = Post::first();
        $this->assertNotNull($post->category);
        $this->assertEquals($post->category->title, $category->title);
    }

    public function testPostHasReadableDate()
    {
        $post = Post::factory()->create();

        $this->assertEquals(
            $post->updated_diff,
            $post->updated_at->format('d M Y'),
        );
    }
}
