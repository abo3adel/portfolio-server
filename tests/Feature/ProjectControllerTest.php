<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testUserCanLoadProject()
    {
        $projects = Project::factory(5)->create();

        $this->getJson("/api/projects")
            ->assertOk()
            ->assertJsonCount(5, "projects")
            ->assertJson([
                "projects" => Project::latest()
                    ->get()
                    ->toArray(),
            ]);
    }
}
