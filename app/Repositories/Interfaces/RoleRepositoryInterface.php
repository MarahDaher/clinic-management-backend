<?php

namespace App\Repositories\Interfaces;

use App\Models\Role;

interface RoleRepositoryInterface
{
    public function getAll();
    public function findById($id): Role;
    public function create(array $data): Role;
    public function update($id, array $data);
    public function delete($id);
}
