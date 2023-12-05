<?php

namespace App\Http\Repositories;

use App\Models\Admin;

class AdminRepositoryImpl implements AdminRepository
{
    public function getAllAdmins()
    {
        return Admin::all();
    }

    public function getAdminById($id)
    {
        return Admin::findOrFail($id);
    }

    public function createAdmin(array $data)
    {
        return Admin::create($data);
    }

    public function updateAdmin(array $data, $id)
    {
        return Admin::whereId($id)->update($data);
    }

    public function deleteAdmin($id)
    {
        return Admin::destroy($id);
    }
}
