<?php

namespace App\Http\Repositories;

interface UserRepository
{
    public function getAllUsers();
    public function getUserById($id);
    public function createUser(array $data);
    public function updateUser(array $data, $id);
    public function deleteUser($id);
}
