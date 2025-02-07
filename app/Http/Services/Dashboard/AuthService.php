<?php

namespace App\Http\Services\Dashboard;

use App\Http\Requests\Dashboard\LoginRequest;
use App\Http\Requests\Dashboard\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class AuthService
{
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

            Log::info("User {$user->id} - {$user->name} registered successfully");

            return redirect('/dashboard/home');
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error("User registration failed: " . $e->getMessage());
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
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
        } catch (Throwable $e) {
            Log::error("Login error: " . $e->getMessage());
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        try {
            $request->session()->invalidate();
            return redirect('/dashboard/sign-in');
        } catch (Throwable $e) {
            Log::error("Logout error: " . $e->getMessage());
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
