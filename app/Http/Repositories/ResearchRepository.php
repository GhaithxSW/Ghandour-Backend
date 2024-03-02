<?php

namespace App\Http\Repositories;

interface ResearchRepository
{
    public function getAllResearches();
    public function getResearches();
    public function getResearchById($id);
    public function createResearch(array $data);
    public function updateResearch(array $data, $id);
    public function deleteResearch($id);
}
