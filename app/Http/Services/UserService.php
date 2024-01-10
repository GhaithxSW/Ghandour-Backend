<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(LoginRequest $request)
    {
        $formFields = $request->validated();
        if (Auth::guard('web')->attempt($formFields)) {
            $request->session()->regenerate();
            return true;
        }
    }

    public function register(UserRequest $request)
    {
        $formFields = $request->validated();
        $formFields['password'] = bcrypt($formFields['password']);
        $user = $this->userRepository->createUser($formFields);
        Auth::guard('web')->login($user);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
