<?php

namespace App\Http\Services\Dashboard;

use App\Models\Progress;
use Illuminate\Support\Facades\DB;

class ProgressService
{
    public function totalAchieved(): int
    {
        return Progress::all()->count();
    }

    public function totalTime()
    {
        $totalSeconds = Progress::sum(DB::raw('UNIX_TIMESTAMP(finish_time) - UNIX_TIMESTAMP(start_time)'));

        $hours = floor($totalSeconds / 3600);
        $minutes = floor(($totalSeconds % 3600) / 60);
        $seconds = $totalSeconds % 60;

        return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
    }

    public function totalTimeInMinutes()
    {
        $totalSeconds = Progress::sum(DB::raw('UNIX_TIMESTAMP(finish_time) - UNIX_TIMESTAMP(start_time)'));

        $totalMinutes = floor($totalSeconds / 60); // Convert to minutes

        return $totalMinutes;
    }



    public function totalAttempts(): int {
        return DB::table('progress')->sum('attempts');
    }

    public function totalFails(): int {
        return DB::table('progress')->sum('failed_attempts');
    }
}
