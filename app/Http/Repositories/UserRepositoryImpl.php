<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepositoryImpl implements UserRepository
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::findOrFail($id);
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function updateUser(array $data, $id)
    {
        return User::whereId($id)->update($data);
    }

    public function deleteUser($id)
    {
        return User::destroy($id);
    }
}
