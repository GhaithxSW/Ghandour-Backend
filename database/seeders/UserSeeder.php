<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('123456'),
            'child_name' => null,
            'child_age' => null,
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'child_name' => null,
            'child_age' => null,
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => bcrypt('123456'),
            'child_name' => 'User Child Name',
            'child_age' => 8,
            'role_id' => 3,
        ]);
    }
}
