<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAll();
    }

    public function findUserById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function createUser(array $data): User
    {
        $createUser = $this->userRepository->create($data);
        return $createUser;
    }

    public function updateUser(array $userData, int $userId)
    {
        return $this->userRepository->update($userId, $userData);
    }

    public function deleteUser(User $user): bool
    {
        return $this->userRepository->delete($user->id);
    }
}
