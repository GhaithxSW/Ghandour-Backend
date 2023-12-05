<?php

namespace App\Http\Repositories;

use App\Models\EducationLevel;

class EducationLevelRepositoryImpl implements EducationLevelRepository
{
    public function getAllEducationLevels()
    {
        return EducationLevel::all();
    }

    public function getEducationLevelById($id)
    {
        return EducationLevel::findOrFail($id);
    }

    public function createEducationLevel(array $data)
    {
        return EducationLevel::create($data);
    }

    public function updateEducationLevel(array $data, $id)
    {
        return EducationLevel::whereId($id)->update($data);
    }

    public function deleteEducationLevel($id)
    {
        return EducationLevel::destroy($id);
    }
}
