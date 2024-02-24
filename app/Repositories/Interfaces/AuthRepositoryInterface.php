<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface AuthRepositoryInterface
{
    public function login(array $credentials);

    public function refresh();

    public function logout();

    public function getUserProfile(): User;
}
