<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin HR',
            'email' => 'hr@mitradata.com',
            'password' => Hash::make('password123'),
            'role' => 'hr',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@mitradata.com',
            'password' => Hash::make('admin123'),
            'role' => 'superadmin',
            'email_verified_at' => now(),
        ]);
    }
}