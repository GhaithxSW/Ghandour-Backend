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
        $roles = [UserRole::superAdmin, UserRole::admin, UserRole::user];

        $roleData = array_map(fn($name) => ['name' => $name], $roles);
        Role::insert($roleData);
    }
}
