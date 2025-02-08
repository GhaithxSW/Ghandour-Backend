<?php

namespace Database\Seeders;

use App\Models\LearnedScene;
use App\Models\Scene;
use App\Models\SupportedScene;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportedAndLearnedSceneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scenes = Scene::where('name', '1')->get();
        foreach ($scenes as $scene) {
            SupportedScene::create([
                'scene_id' => $scene->id,
                'user_id' => User::where('name', 'Test User')->first()->id,
            ]);

            LearnedScene::create([
                'scene_id' => $scene->id,
                'user_id' => User::where('name', 'Test User')->first()->id,
            ]);
        }
    }
}
