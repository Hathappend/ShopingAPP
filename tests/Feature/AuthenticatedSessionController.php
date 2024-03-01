<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticatedSessionController extends TestCase
{
    public function testStore()
    {
        $this->seed(UserSeeder::class);

        $credentials = [
            'usernameOrEmail' => "asepy",
            'password' => "asepyamans"
        ];

        $response = $this->post('/login', $credentials);

        $this->assertAuthenticated();

        $response->assertRedirect(RouteServiceProvider::HOME);
    }

}
