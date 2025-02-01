<?php

namespace Database\Seeders;

use App\Models\Scene;
use Illuminate\Database\Seeder;

class SceneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Scene::create([
            'name' => 'First Scene',
            'category_id' => 1,
            'scene_unity_id' => 1,
        ]);

        Scene::create([
            'name' => 'Second Scene',
            'category_id' => 2,
            'scene_unity_id' => 2,
        ]);

        Scene::create([
            'name' => 'Third Scene',
            'category_id' => 3,
            'scene_unity_id' => 3,
        ]);
    }
}
