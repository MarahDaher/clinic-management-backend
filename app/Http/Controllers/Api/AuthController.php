<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthController extends BaseController
{
    private AuthService $authService;
    private UserService $userService;

    public function __construct(AuthService $authService, UserService $userService)
    {
        $this->authService = $authService;
        $this->userService = $userService;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $token = $this->authService->login([
                'user_name' => $request->user_name,
                'password' => $request->password
            ]);

            if (!$token) {
                return $this->respondError('Invalid password', Response::HTTP_UNAUTHORIZED);
            }

            return $this->respond($this->createNewToken($token));
        } catch (\Exception $e) {
            return $this->respondError($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getUserProfile(): JsonResponse
    {
        try {
            $userData = $this->authService->getUserProfile();

            return $this->respond($userData);
        } catch (\Exception $e) {
            return $this->respondError($e->getMessage(), Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     * @return array
     */
    protected function createNewToken($token): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => $this->authService->getUserProfile()
        ];
    }
}
