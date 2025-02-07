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
        for ($i = 1; $i <= Game::all()->count(); $i++) {
            Category::create([
                'name' => 'الأحرف',
                'game_id' => $i,
            ]);

            Category::create([
                'name' => 'الأرقام',
                'game_id' => $i,
            ]);

            Category::create([
                'name' => 'المفاهيم الرياضية',
                'game_id' => $i,
            ]);

            Category::create([
                'name' => 'الألوان',
                'game_id' => $i,
            ]);

            Category::create([
                'name' => 'الفصول الأربعة',
                'game_id' => $i,
            ]);

            Category::create([
                'name' => 'Complex',
                'game_id' => $i,
            ]);

            Category::create([
                'name' => 'فواكه',
                'game_id' => $i,
            ]);
        }
    }
}
