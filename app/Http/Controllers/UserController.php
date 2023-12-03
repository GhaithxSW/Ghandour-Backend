<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function viewSignUp()
    // {
    //     if (app()->getLocale() == 'en') return view('pages.authentication.boxed.signup', ['title' => 'SignUp']);
    //     if (app()->getLocale() == 'ar') return view('pages-rtl.authentication.boxed.signup', ['title' => 'SignUp']);
    // }

    public function register(UserRequest $request)
    {
        $formFields = $request->all();
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        auth()->login($user);

        if (app()->getLocale() == 'en') return redirect('/en/request-research');
        if (app()->getLocale() == 'ar') return redirect('/ar/request-research');
    }

    // public function viewSignIn()
    // {
    //     if (app()->getLocale() == 'en') return view('pages.authentication.boxed.signin', ['title' => 'SignIn']);
    //     if (app()->getLocale() == 'ar') return view('pages-rtl.authentication.boxed.signin', ['title' => 'SignIn']);
    // }

    public function login(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->guard('web')->attempt($formFields)) {
            $request->session()->regenerate();

            if (app()->getLocale() == 'en') return redirect('/request-research');
            if (app()->getLocale() == 'ar') return redirect('/rtl/request-research');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if (app()->getLocale() == 'en') return redirect('/en');
        if (app()->getLocale() == 'ar') return redirect('/ar');
    }

    // public function profile()
    // {
    //     if (app()->getLocale() == 'en') return view('pages.user.profile', ['title' => 'Profile']);
    //     if (app()->getLocale() == 'ar') return view('pages-rtl.user.profile', ['title' => 'Profile']);
    // }
}
