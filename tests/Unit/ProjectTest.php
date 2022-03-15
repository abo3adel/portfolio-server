<?php

namespace Tests\Unit;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testProjectCastsToArray()
    {
        $p = Project::factory()->create();

        $this->assertIsArray($p->tags);
        $this->assertIsArray($p->shots);

        $tags = $this->faker->words();
        $shots = $this->faker->words();

        $p->tags = $tags;
        $p->shots = $shots;
        $p->save();

        $this->assertDatabaseHas("projects", [
            "id" => $p->id,
            "tags" => json_encode($tags),
            "shots" => json_encode($shots),
        ]);
    }
}
