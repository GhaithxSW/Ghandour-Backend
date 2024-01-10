<?php

namespace App\Http\Services\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\LoginRequest;

class AuthService
{
    public function login(LoginRequest $request)
    {
        $formFields = $request->validated();
        if (Auth::guard('admin')->attempt($formFields)) {
            $request->session()->regenerate();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
