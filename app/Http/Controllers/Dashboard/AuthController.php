<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RegisterRequest;
use App\Http\Requests\Dashboard\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function viewSignUp(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.pages.authentication.boxed.signup', ['title' => 'إنشاء حساب جديد']);
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $validatedRequest = $request->validated();

            $user = User::create([
                'name' => $validatedRequest['name'],
                'email' => $validatedRequest['email'],
                'password' => bcrypt($validatedRequest['password']),
                'child_name' => $validatedRequest['childName'],
                'child_age' => $validatedRequest['childAge'],
                'role_id' => 2,
            ]);

            Auth::login($user);
            $request->session()->regenerate();

            DB::commit();

            Log::info("User {$user->name} registered successfully");

            return redirect('/dashboard/home');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("User registration failed: " . $e->getMessage());
            return back()->withErrors(['error' => 'Something went wrong. Please try again.'])->withInput();
        }
    }

    public function viewSignIn(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.pages.authentication.boxed.signin', ['title' => 'تسجيل الدخول']);
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        try {
            $formFields = $request->validated();

            $user = User::where('email', $formFields['email'])->first();

            if (!$user || !Hash::check($formFields['password'], $user->password)) {
                return back()->withErrors(['email' => 'كلمة المرور او البريد الالكتروني خطأ'])->withInput();
            }

            Auth::login($user);
            $request->session()->regenerate();

            Log::info("User {$user->email} logged in successfully");

            return redirect('/dashboard/home');
        } catch (Exception $e) {
            Log::error("Login error: " . $e->getMessage());
            return back()->withErrors(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        try {
            $request->session()->invalidate();
            return redirect('/dashboard/sign-in');
        } catch (Exception $e) {
            Log::error("Logout error: " . $e->getMessage());
            return back()->withErrors(['error' => 'Something went wrong. Please try again.']);
        }
    }
}
