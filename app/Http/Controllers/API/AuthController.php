<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Services\API\AuthService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @throws Exception
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $response = $this->authService->register($request);
        return response()->json(['message' => 'User registered successfully', 'data' => $response], 201);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $response = $this->authService->login($request);
        return response()->json(['message' => 'User logged in successfully', 'data' => $response], 200);
    }

    public function logout(): JsonResponse
    {
        $response = $this->authService->logout();
        return response()->json(['message' => $response['message']], $response['status']);
    }
}
