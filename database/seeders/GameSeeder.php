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
        Game::create([
            'name' => 'Drag & Drop',
        ]);

        Game::create([
            'name' => 'Click',
        ]);

        Game::create([
            'name' => 'Line Matching',
        ]);

        Game::create([
            'name' => 'Voice',
        ]);

        Game::create([
            'name' => 'Complex',
        ]);
    }
}
