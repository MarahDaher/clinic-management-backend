<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use App\Repositories\Interfaces\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    public function getAll()
    {
        return Role::all();
    }

    public function getRoleById($id): Role
    {
        return Role::find($id);
    }

    public function create(array $data): Role
    {
        return Role::create($data);
    }

    public function update($id, array $attributes)
    {
        $role = Role::findOrFail($id);
        $role->update($attributes);
        return $role;
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        return $role->delete();
    }

    public function assignRole(User $user, string $role): void
    {
        $user->assignRole($role);
    }
}
