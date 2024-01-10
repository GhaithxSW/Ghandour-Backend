<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(UserRequest $request)
    {
        try {
            $this->userService->register($request);
            return redirect()->route('request-research');
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            if ($this->userService->login($request))
                return redirect()->route('request-research');
            return back()->withErrors(['email' => __('trans.invalid_credentials')])->onlyInput('email');
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function logout(Request $request)
    {
        $this->userService->logout($request);
        return redirect()->route('index');
    }
}
