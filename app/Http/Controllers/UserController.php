<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(UserRequest $request)
    {
        $this->userService->register($request);

        if (app()->getLocale() == 'en') return redirect('/en/request-research');
        if (app()->getLocale() == 'ar') return redirect('/ar/request-research');
    }

    public function login(LoginRequest $request)
    {
        $formFields = $request->validated();

        if (auth()->guard('web')->attempt($formFields)) {
            $request->session()->regenerate();

            if (app()->getLocale() == 'en') return redirect('/request-research');
            if (app()->getLocale() == 'ar') return redirect('/rtl/request-research');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        $this->userService->logout($request);

        if (app()->getLocale() == 'en') return redirect()->route('index');
        if (app()->getLocale() == 'ar') return redirect()->route('rtl-index');
    }

    // public function profile()
    // {
    //     if (app()->getLocale() == 'en') return view('pages.user.profile', ['title' => 'Profile']);
    //     if (app()->getLocale() == 'ar') return view('pages-rtl.user.profile', ['title' => 'Profile']);
    // }
}
