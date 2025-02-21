<?php

namespace App\Http\Services\Dashboard;

use App\Http\Enums\UserRole;
use App\Models\Progress;
use App\Models\Role;
use App\Models\User;
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

        return floor($totalSeconds / 60);
    }

    public function totalAttempts(): int
    {
        return DB::table('progress')
            ->where('user_id', auth()->id())
            ->sum('attempts');
    }

    public function totalFails(): int
    {
        return DB::table('progress')
            ->where('user_id', auth()->id())
            ->sum('failed_attempts');
    }

    public function totalUsers()
    {
        return User::where('role_id', Role::where('name', UserRole::user->value)->first()->id)->count();
    }

    public function totalAdmins()
    {
        return User::where('role_id', Role::where('name', UserRole::admin->value)->first()->id)->count();
    }
}
