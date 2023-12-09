<?php

namespace App\Http\Repositories;

use App\Models\Team;

class TeamRepositoryImpl implements TeamRepository
{
    public function getAllMembers()
    {
        return Team::all();
    }

    public function getMemberById($id)
    {
        return Team::findOrFail($id);
    }

    public function createMember(array $data)
    {
        return Team::create($data);
    }

    public function updateMember(array $data, $id)
    {
        return Team::whereId($id)->update($data);
    }

    public function deleteMember($id)
    {
        return Team::destroy($id);
    }
}
