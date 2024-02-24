<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getAll();
    public function findById($id): User;
    public function create(array $data): User;
    public function update($id, array $data);
    public function delete($id);
}
