<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Orchid\Support\Testing\ScreenTesting;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    use ScreenTesting;

    public function testItWillShowAdminLoginPage()
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }
}
