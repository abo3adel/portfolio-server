<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testUserCanGetLatestPosts()
    {
        Post::factory(15)->create();

        $this->getJson("/api/posts")
            ->assertOk()
            ->assertJsonCount(7, "posts")
            ->assertExactJson([
                "posts" => Post::with("category")
                    ->limit(7)
                    ->orderBy("created_at", "desc")
                    ->get()
                    ->toArray(),
            ]);
    }
}
