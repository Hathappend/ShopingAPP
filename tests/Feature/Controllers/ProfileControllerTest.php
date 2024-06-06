<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    public function testPostEdit()
    {
        $this->seed(UserSeeder::class);

        $file = UploadedFile::fake()->image('test.png');

        $this->actingAs(User::find(1))
            ->post('/admin/profile/edit', [
                'name' => 'asepy',
                'username' => 'asepyamans',
                'email' => 'ashyamsur@gmail.com',
                'profile_image' => time().'_'.$file->name
            ])->assertRedirect('/admin/profile')
            ->assertSessionHas('success', "Profile saved.");

        $this->assertDatabaseHas('users', [
            'name' => 'asepy',
            'username' => 'asepyamans',
            'email' => 'ashyamsur@gmail.com',
            'profile_image' => time().'_test.png'
        ]);
    }

}
