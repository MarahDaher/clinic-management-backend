<?php

namespace App\Services;

use App\Config\RoleConstants;
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

        $roleData = null;
        $clinicData = null;

        // Retrieve role data if available
        if ($userProfile->role) {
            $roleData = [
                'id' => $userProfile->role->id,
                'name' => $userProfile->role->name
            ];
        }

        // Check if the user's role is clinic_admin
        if ($userProfile->role && $userProfile->role->name === RoleConstants::CLINIC_ADMIN) {
            // Retrieve clinic data if available
            if ($userProfile->clinic) {
                $clinicData = [
                    'id' => $userProfile->clinic->id,
                    'name' => $userProfile->clinic->name
                ];
            }
        }

        return [
            'id' => $userProfile->id,
            'name' => $userProfile->name,
            'user_name' => $userProfile->user_name,
            'email' => $userProfile->email,
            'phone' => $userProfile->phone,
            'role' => $roleData,
            'clinic' => $clinicData
        ];
    }
}
