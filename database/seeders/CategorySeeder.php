<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'First Category',
            'game_id' => 1,
        ]);

        Category::create([
            'name' => 'Second Category',
            'game_id' => 1,
        ]);

        Category::create([
            'name' => 'Third Category',
            'game_id' => 1,
        ]);
    }
}
