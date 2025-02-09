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
        $games = Game::whereIn('name', ['نقر', 'مطابقة', 'وصل', 'نطق'])->pluck('id', 'name');

        $categories = Category::whereIn('name', [
            'أحرف', 'كلمات', 'أرقام', 'مفاهيم الرياضية', 'ألوان', 'الفصول الأربعة', 'مختلطة', 'فواكه', 'حيوانات', 'خضار'
        ])->get()->groupBy('name');

        $scenes = [
            ['name' => 'أ', 'category' => ['أحرف', 'نقر'], 'scene_unity_id' => 1],
            ['name' => 'أ', 'category' => ['أحرف', 'مطابقة'], 'scene_unity_id' => 2],
            ['name' => 'أ', 'category' => ['أحرف', 'وصل'], 'scene_unity_id' => 3],
            ['name' => 'أ', 'category' => ['أحرف', 'نطق'], 'scene_unity_id' => 4],
            ['name' => 'أسد', 'category' => ['كلمات', 'نطق'], 'scene_unity_id' => 5],
            ['name' => 'اناناس', 'category' => ['فواكه', 'مطابقة'], 'scene_unity_id' => 6],
            ['name' => '١', 'category' => ['أرقام', 'نقر'], 'scene_unity_id' => 7],
            ['name' => '١', 'category' => ['أرقام', 'مطابقة'], 'scene_unity_id' => 8],
            ['name' => '١', 'category' => ['أرقام', 'وصل'], 'scene_unity_id' => 9],
            ['name' => '١', 'category' => ['أرقام', 'نطق'], 'scene_unity_id' => 10],
            ['name' => 'كلب', 'category' => ['حيوانات', 'مطابقة'], 'scene_unity_id' => 11],
            ['name' => 'أحمر', 'category' => ['ألوان', 'نقر'], 'scene_unity_id' => 12],
            ['name' => 'أحمر', 'category' => ['ألوان', 'مطابقة'], 'scene_unity_id' => 13],
            ['name' => 'أحمر', 'category' => ['ألوان', 'وصل'], 'scene_unity_id' => 14],
            ['name' => 'أحمر', 'category' => ['ألوان', 'نطق'], 'scene_unity_id' => 15],
            ['name' => 'الشتاء', 'category' => ['الفصول الأربعة', 'نقر'], 'scene_unity_id' => 16],
            ['name' => 'ب', 'category' => ['أحرف', 'نقر'], 'scene_unity_id' => 17],
            ['name' => 'ب', 'category' => ['أحرف', 'مطابقة'], 'scene_unity_id' => 18],
            ['name' => 'ب', 'category' => ['أحرف', 'وصل'], 'scene_unity_id' => 19],
            ['name' => 'ب', 'category' => ['أحرف', 'نطق'], 'scene_unity_id' => 20],
            ['name' => 'باب', 'category' => ['كلمات', 'نطق'], 'scene_unity_id' => 21],
            ['name' => 'كبير و صغير', 'category' => ['مفاهيم الرياضية', 'نقر'], 'scene_unity_id' => 22],
            ['name' => '٢', 'category' => ['أرقام', 'نقر'], 'scene_unity_id' => 23],
            ['name' => '٢', 'category' => ['أرقام', 'مطابقة'], 'scene_unity_id' => 24],
            ['name' => '٢', 'category' => ['أرقام', 'وصل'], 'scene_unity_id' => 25],
            ['name' => '٢', 'category' => ['أرقام', 'نطق'], 'scene_unity_id' => 26],
            ['name' => 'بندورة', 'category' => ['خضار', 'مطابقة'], 'scene_unity_id' => 27],
            ['name' => 'أزرق', 'category' => ['ألوان', 'نقر'], 'scene_unity_id' => 28],
            ['name' => 'أزرق', 'category' => ['ألوان', 'مطابقة'], 'scene_unity_id' => 29],
            ['name' => 'أزرق', 'category' => ['ألوان', 'وصل'], 'scene_unity_id' => 30],
            ['name' => 'أزرق', 'category' => ['ألوان', 'نطق'], 'scene_unity_id' => 31],
            ['name' => 'ت', 'category' => ['أحرف', 'نقر'], 'scene_unity_id' => 32],
            ['name' => 'ت', 'category' => ['أحرف', 'مطابقة'], 'scene_unity_id' => 33],
        ];

        foreach ($scenes as $scene) {
            $category = $categories[$scene['category'][0]]->firstWhere('game_id', $games[$scene['category'][1]])->id ?? null;
            if ($category) {
                Scene::create([
                    'name' => $scene['name'],
                    'category_id' => $category,
                    'scene_unity_id' => $scene['scene_unity_id'],
                ]);
            }
        }
    }
}
