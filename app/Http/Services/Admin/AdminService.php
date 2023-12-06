<?php

namespace App\Http\Services\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminService
{
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
