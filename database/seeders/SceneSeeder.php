<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Game;
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
            'name' => 'أ',
            'category_id' => Category::where(['name' => 'الأحرف', 'game_id' => Game::where('name', 'Drag & Drop')->first()->id])->first()->id,
            'scene_unity_id' => 4,
        ]);

        Scene::create([
            'name' => 'أ',
            'category_id' => Category::where(['name' => 'الأحرف', 'game_id' => Game::where('name', 'Click')->first()->id])->first()->id,
            'scene_unity_id' => 3,
        ]);

        Scene::create([
            'name' => 'أ',
            'category_id' => Category::where(['name' => 'الأحرف', 'game_id' => Game::where('name', 'Line Matching')->first()->id])->first()->id,
            'scene_unity_id' => 5,
        ]);

        Scene::create([
            'name' => 'أ',
            'category_id' => Category::where(['name' => 'الأحرف', 'game_id' => Game::where('name', 'Voice')->first()->id])->first()->id,
            'scene_unity_id' => 6,
        ]);

        Scene::create([
            'name' => '[افوكادو،اناناس،بطيخ]',
            'category_id' => Category::where(['name' => 'فواكه', 'game_id' => Game::where('name', 'Drag & Drop')->first()->id])->first()->id,
            'scene_unity_id' => 7,
        ]);

        Scene::create([
            'name' => '١',
            'category_id' => Category::where(['name' => 'الأرقام', 'game_id' => Game::where('name', 'Click')->first()->id])->first()->id,
            'scene_unity_id' => 8,
        ]);

        Scene::create([
            'name' => '٢',
            'category_id' => Category::where(['name' => 'الأرقام', 'game_id' => Game::where('name', 'Click')->first()->id])->first()->id,
            'scene_unity_id' => 9,
        ]);

        Scene::create([
            'name' => '٣',
            'category_id' => Category::where(['name' => 'الأرقام', 'game_id' => Game::where('name', 'Click')->first()->id])->first()->id,
            'scene_unity_id' => 10,
        ]);

        Scene::create([
            'name' => '[١،٢،٣]',
            'category_id' => Category::where(['name' => 'الأرقام', 'game_id' => Game::where('name', 'Drag & Drop')->first()->id])->first()->id,
            'scene_unity_id' => 11,
        ]);

        Scene::create([
            'name' => '[١،٢،٣]',
            'category_id' => Category::where(['name' => 'الأرقام', 'game_id' => Game::where('name', 'Line Matching')->first()->id])->first()->id,
            'scene_unity_id' => 12,
        ]);
    }
}
