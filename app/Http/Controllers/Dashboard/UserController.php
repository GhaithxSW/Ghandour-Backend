<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getAllUsers(): Collection
    {
        return DB::table('users', 'u')
            ->join('roles as r', 'u.role_id', '=', 'r.id')
            ->select('u.id as userId', 'u.name as username', 'u.email', 'u.role_id', 'r.name as roleName', 'u.child_name as childName', 'u.child_age as childAge', 'u.created_at as creationTime')
            ->where('r.name', UserRole::user)
            ->get();
    }
}
