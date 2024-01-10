<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\Admin\AuthService;
use App\Http\Requests\Admin\LoginRequest;

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
        try {
            $this->authService->login($request);
            return redirect()->route('dashboard');
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request);
        return redirect()->route('admin-sign-in');
    }

    public function redirectPage()
    {
        if (Auth::guard('admin')->user())
        {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('admin-sign-in');
        }
    }
}
