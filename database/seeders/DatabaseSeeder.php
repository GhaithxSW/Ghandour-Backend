<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            GameSeeder::class,
            CategorySeeder::class,
            SceneSeeder::class,
            SupportedSceneSeeder::class,
            LearnedSceneSeeder::class,
            SupportedAndLearnedSceneSeeder::class,
            ProgressSeeder::class,
        ]);
    }
}
