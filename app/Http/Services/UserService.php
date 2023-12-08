<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\UserRepository;
use Exception;

class UserService
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(LoginRequest $request)
    {
        try {
            $formFields = $request->validated();
            if (Auth::guard('web')->attempt($formFields)) {
                $request->session()->regenerate();
                return true;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function register(UserRequest $request)
    {
        try {
            $formFields = $request->validated();
            $formFields['password'] = bcrypt($formFields['password']);
            $user = $this->userRepository->createUser($formFields);
            Auth::guard('web')->login($user);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
