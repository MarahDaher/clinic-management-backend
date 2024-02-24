<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::all();
    }

    public function findById($id): User
    {
        return User::find($id);
    }

    public function create(array $data): User
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }

    public function update($id, array $attributes)
    {
        $User = User::findOrFail($id);
        $User->update($attributes);
        return $User;
    }

    public function delete($id)
    {
        $User = User::findOrFail($id);
        return $User->delete();
    }
}
