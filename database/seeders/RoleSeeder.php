<?php

namespace Database\Seeders;

use App\Http\Enums\UserRole;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => UserRole::admin
        ]);

        Role::create([
            'name' => UserRole::user
        ]);
    }
}
