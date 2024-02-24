<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;

class AuthService
{
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * Logs in a user with the given credentials.
     */
    public function login(array $credentials): bool|string
    {
        return $this->authRepository->login($credentials);
    }

    public function refresh()
    {
        return $this->authRepository->refresh();
    }

    /**
     * Logs the user out.
     */
    public function logout(): void
    {
        $this->authRepository->logout();
    }

    /**
     * Retrieves the user's profile.
     */
    public function getUserProfile(): array
    {
        $userProfile = $this->authRepository->getUserProfile();

        $roleName = $userProfile->role ? $userProfile->role->name : null;
        $clinicName = null;

        // Check if the user's role is clinic_admin
        if ($roleName === 'clinic_admin') {
            // If so, set the clinic name
            $clinicName = $userProfile->clinic ? $userProfile->clinic->name : null;
        }

        return [
            'id' => $userProfile->id,
            'name' => $userProfile->name,
            'user_name' => $userProfile->user_name,
            'email' => $userProfile->email,
            'phone' => $userProfile->phone,
            'role' => $roleName,
            'clinic_name' => $clinicName,
        ];
    }
}
