<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Requests\Admin\LoginRequest;

class AdminController extends Controller
{

    public function dashboard(){
        return view('admin.pages.dashboard', ['title' => __('trans.bhoothat')]);
    }

    public function viewSignUp()
    {
        return view('admin.pages.authentication.boxed.signup', ['title' => __('trans.bhoothat')]);
    }

    public function register(AdminRequest $request)
    {
        $formFields = $request->all();
        $formFields['password'] = bcrypt($formFields['password']);

        $admin = Admin::create($formFields);
        Auth::guard('admin')->login($admin);

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
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin-panel-management/sign-in');
    }

    // public function profile()
    // {
    //     if (app()->getLocale() == 'en') return view('pages.user.profile', ['title' => 'Profile']);
    //     if (app()->getLocale() == 'ar') return view('pages-rtl.user.profile', ['title' => 'Profile']);
    // }
}
