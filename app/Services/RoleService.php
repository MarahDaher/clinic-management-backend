<?php

namespace App\Services;

use App\Models\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface;

class RoleService
{
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAllRoles()
    {
        return $this->roleRepository->getAll();
    }

    public function findById($id): Role
    {
        return $this->roleRepository->findById($id);
    }

    public function createRole(array $data): Role
    {
        $createRole = $this->roleRepository->create($data);
        return $createRole;
    }
}
