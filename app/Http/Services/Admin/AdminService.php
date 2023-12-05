<?php

namespace App\Http\Services\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\AdminRequest;

class AdminService
{
    public function register(AdminRequest $request)
    {
        $formFields = $request->validated();
        $formFields['password'] = bcrypt($formFields['password']);

        $admin = Admin::create($formFields);
        Auth::guard('admin')->login($admin);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
