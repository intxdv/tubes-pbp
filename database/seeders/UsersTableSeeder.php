<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        // Buyer 1
        User::updateOrCreate(
            ['email' => 'buyer1@example.com'],
            [
                'name' => 'Buyer 1',
                'password' => bcrypt('password'),
                'role' => 'buyer',
            ]
        );

        // Buyer 2
        User::updateOrCreate(
            ['email' => 'buyer2@example.com'],
            [
                'name' => 'Buyer 2',
                'password' => bcrypt('password'),
                'role' => 'buyer',
            ]
        );
    }
}
