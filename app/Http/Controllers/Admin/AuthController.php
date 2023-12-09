<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Services\Admin\AuthService;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function viewSignIn()
    {
        return view('admin.pages.authentication.boxed.signin', ['title' => 'تسجيل الدخول']);
    }

    public function login(LoginRequest $request)
    {
        $this->authService->login($request);
        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request);
        return redirect()->route('admin-sign-in');
    }
}
