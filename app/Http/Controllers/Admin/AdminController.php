<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Services\Admin\AdminService;

class AdminController extends Controller
{

    private AdminService $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function dashboard()
    {
        return view('admin.pages.dashboard', ['title' => __('trans.bhoothat')]);
    }

    // public function viewSignUp()
    // {
    //     return view('admin.pages.authentication.boxed.signup', ['title' => __('trans.bhoothat')]);
    // }

    public function register(AdminRequest $request)
    {
        $this->adminService->register($request);

        return redirect('/admin-panel-management/dashboard');
    }

    public function viewSignIn()
    {
        return view('admin.pages.authentication.boxed.signin', ['title' => __('trans.bhoothat')]);
    }

    public function login(LoginRequest $request)
    {
        $formFields = $request->validated();

        if (Auth::guard('admin')->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/admin-panel-management/dashboard');
        }

        return back()->withErrors(['username' => 'Invalid Credentials'])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        $this->adminService->logout($request);

        return redirect('/admin-panel-management/sign-in');
    }

    // public function profile()
    // {
    //     if (app()->getLocale() == 'en') return view('pages.user.profile', ['title' => 'Profile']);
    //     if (app()->getLocale() == 'ar') return view('pages-rtl.user.profile', ['title' => 'Profile']);
    // }
}
