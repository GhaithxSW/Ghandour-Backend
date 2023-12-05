<?php

namespace App\Http\Services;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserService
{
    public function register(UserRequest $request)
    {
        $formFields = $request->all();
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        auth()->login($user);
    }

    public function logout(Request $request)
    {
        auth()->guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
