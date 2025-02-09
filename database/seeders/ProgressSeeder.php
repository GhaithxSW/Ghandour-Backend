<?php

namespace Database\Seeders;

use App\Models\Progress;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Progress::create([
            'user_id' => User::where('email', 'test@gmail.com')->first()->id,
            'scene_id' => 2,
            'attempts' => 5,
            'failed_attempts' => 3,
            'start_time' => Carbon::now(),
            'finish_time' => Carbon::now()->addMinutes(30),
        ]);
    }
}
