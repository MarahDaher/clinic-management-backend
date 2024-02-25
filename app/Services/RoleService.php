<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use App\Repositories\Interfaces\RoleRepositoryInterface;

class RoleService
{
    private RoleRepositoryInterface $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAllRoles()
    {
        return $this->roleRepository->getAll();
    }

    /**
     * Get role by ID
     *
     * @param int $id
     * @return Role
     */
    public function getRoleById(int $id): Role
    {
        $role = $this->roleRepository->getRoleById($id);
        return $role->load('permissions');
    }

    public function createRole(array $data): Role
    {
        $createRole = $this->roleRepository->create($data);
        return $createRole;
    }

    /**
     * Assign a role to a user.
     *
     * @param User $user The user to assign the role to.
     * @param Role $role The role to assign.
     */
    public function assignRole(User $user, Role $role)
    {
        $this->roleRepository->assignRole($user, $role);
    }

    public function getPermissionsForRole($roleName)
    {
        // Retrieve the role by name
        $role = Role::where('name', $roleName)->firstOrFail();

        // Return the permissions associated with the role
        return $role->permissions;
    }
}
