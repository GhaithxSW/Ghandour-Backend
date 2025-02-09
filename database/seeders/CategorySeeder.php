<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Game;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['أحرف', 'كلمات', 'أرقام', 'مفاهيم الرياضية', 'ألوان', 'الفصول الأربعة', 'مختلطة', 'فواكه', 'حيوانات', 'خضار'];

        $gameIds = Game::pluck('id');

        foreach ($gameIds as $gameId) {
            $categoryData = array_map(fn($name) => ['name' => $name, 'game_id' => $gameId], $categories);
            Category::insert($categoryData);
        }
    }
}
