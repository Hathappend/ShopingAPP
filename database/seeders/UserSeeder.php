<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->id = 1;
        $user->name = "Asep Yaman Suryaman";
        $user->username = "asepy";
        $user->email = "ashyamsur@gmail.com";
        $user->password = "asepyamans";
        $user->email_verified_at = Carbon::now();
        $user->save();
    }
}
