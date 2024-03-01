<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class RegisteredUserControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testStore()
    {
        $userData = [
            'name' => $this->faker->name,
            'username' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => "asepyamans",
            'password_confirmation' => "asepyamans",
        ];

        // Mock the Registered event
        Event::fake();

        // Make a POST request to store user
        $response = $this->post('/register', $userData);

        // Assert that the user was created in the database
        $this->assertDatabaseHas('users', [
            'name' => $userData['name'],
            'username' => $userData['username'],
            'email' => $userData['email'],
        ]);

        // Assert that the user is authenticated
        $this->assertAuthenticated();

        // Assert that the Registered event was dispatched
        Event::assertDispatched(Registered::class);

        // Assert that the user is redirected to the home page
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

}
