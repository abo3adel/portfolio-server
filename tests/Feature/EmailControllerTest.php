<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmailControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function testItWillShowErrorIfRequiredNotAdded()
    {
        $this->postJson("/api/send-mail", [])->assertStatus(422);
    }


    /** commented because it actually send mail */
    // public function testItWillSaveEmail()
    // {
    //     // $this->withoutExceptionHandling();

    //     $name = $this->faker->name;
    //     $email = $this->faker->email;
    //     $message = $this->faker->text();

    //     $this->postJson("/api/send-mail", compact("name", "email", "message"))
    //         ->assertStatus(200)
    //         ->assertJson(["done" => true]);
    // }
}
