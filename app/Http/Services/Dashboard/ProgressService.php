<?php

namespace App\Http\Services\Dashboard;

use App\Models\Progress;
use Illuminate\Support\Facades\DB;

class ProgressService
{
    public function totalAchieved(): int
    {
        return Progress::where('user_id', auth()->id())->count();
    }


    public function totalTime(): string
    {
        $totalSeconds = Progress::where('user_id', auth()->id())
            ->sum(DB::raw('UNIX_TIMESTAMP(finish_time) - UNIX_TIMESTAMP(start_time)'));

        $hours = floor($totalSeconds / 3600);
        $minutes = floor(($totalSeconds % 3600) / 60);
        $seconds = $totalSeconds % 60;

        return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
    }

    public function totalTimeInMinutes(): float
    {
        $totalSeconds = Progress::where('user_id', auth()->id())
            ->sum(DB::raw('UNIX_TIMESTAMP(finish_time) - UNIX_TIMESTAMP(start_time)'));

        // Convert to minutes
        return floor($totalSeconds / 60);
    }


    public function totalAttempts(): int
    {
        return DB::table('progress')
            ->where('user_id', auth()->id()) // Filter by logged-in user
            ->sum('attempts');
    }

    public function totalFails(): int
    {
        return DB::table('progress')
            ->where('user_id', auth()->id()) // Filter by logged-in user
            ->sum('failed_attempts');
    }
}
