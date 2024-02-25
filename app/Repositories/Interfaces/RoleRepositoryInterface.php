<?php

namespace App\Repositories\Interfaces;

use App\Models\Role;
use App\Models\User;

interface RoleRepositoryInterface
{
    public function getAll();
    public function getRoleById($id): Role;
    public function create(array $data): Role;
    public function update($id, array $data);
    public function delete($id);
    public function assignRole(User $user, string $role): void;
}
