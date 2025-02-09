<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = ['مطابقة', 'نقر', 'وصل', 'نطق', 'مختلطة'];

        $gameData = array_map(fn($name) => ['name' => $name], $games);
        Game::insert($gameData);
    }
}
