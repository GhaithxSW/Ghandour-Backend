<?php

namespace App\Http\Services\API;

use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Responses\UserResponse;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthService
{
    /**
     * @throws Exception
     */
    public function register(RegisterRequest $request): UserResponse
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

            $token = $user->createToken('MyApp')->plainTextToken;

            DB::commit();

            Log::info("User {$user->name} registered successfully");

            return new UserResponse($token, $user->id, $user->name, $user->email, $user->child_name, $user->child_age, $user->role->name);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("User registration failed: " . $e->getMessage());
            throw new Exception('User registration failed: ' . $e->getMessage(), 500);
        }
    }

    /**
     * @throws Exception
     */
    public function login(LoginRequest $request): UserResponse
    {
        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $token = $user->createToken('MyApp')->plainTextToken;

                Log::info("User {$user->name} logged in successfully");
                return new UserResponse($token, $user->id, $user->name, $user->email, $user->child_name, $user->child_age, $user->role->name);
            } else {
                throw new Exception('Invalid credentials', 422);
            }
        } catch (Exception $e) {
            Log::error("User login failed: " . $e->getMessage());
            throw new Exception('User login failed: ' . $e->getMessage(), 500);
        }
    }

    /**
     * @throws Exception
     */
    public function logout(): array
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return ['message' => 'Unauthenticated', 'status' => 401];
            }

            if ($user->currentAccessToken()) {
                $user->currentAccessToken()->delete();
                Log::info("User {$user->name} logged out successfully");

                return ['message' => 'User logged out successfully', 'status' => 200];
            }

            return ['message' => 'No active token found', 'status' => 401];
        } catch (Exception $e) {
            Log::error("User logout failed: " . $e->getMessage());
            throw new Exception('User login failed: ' . $e->getMessage(), 500);
        }
    }
}
