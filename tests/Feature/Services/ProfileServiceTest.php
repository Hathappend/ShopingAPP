<?php

namespace Tests\Feature\Services;

use App\Models\User;
use App\Services\Admin\ProfileService;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ProfileServiceTest extends TestCase
{
    private ProfileService $profileService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->profileService = $this->app->make(ProfileService::class);
    }

    public function testProfileServiceSingletons()
    {
        $object1 = $this->app->make(ProfileService::class);
        $object2 = $this->app->make(ProfileService::class);

        self::assertSame($object1, $object2);
    }

    public function testUpdate()
    {
        $this->seed(UserSeeder::class);

        $data = [
            'profile_image' => UploadedFile::fake()->image('text.png')
        ];

        $this->actingAs(User::find(1));

        $result = $this->profileService->update($data);

        self::assertTrue($result);

    }


}
