<?php

namespace App\Http\Repositories;

interface EducationLevelRepository
{
    public function getAllEducationLevels();
    public function getEducationLevelById($id);
    public function createEducationLevel(array $data);
    public function updateEducationLevel(array $data, $id);
    public function deleteEducationLevel($id);
}
