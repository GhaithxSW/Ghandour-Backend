<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RegisterRequest;
use App\Http\Requests\Dashboard\LoginRequest;
use App\Http\Services\Dashboard\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function viewSignUp(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.pages.authentication.signup', ['title' => 'إنشاء حساب جديد']);
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        return $this->authService->register($request);
    }

    public function viewSignIn(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.pages.authentication.signin', ['title' => 'تسجيل الدخول']);
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        return $this->authService->login($request);
    }

    public function logout(Request $request): RedirectResponse
    {
        return $this->authService->logout($request);
    }
}
