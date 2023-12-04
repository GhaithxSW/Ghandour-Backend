<?php

namespace App\Http\Repositories;

interface ResearchRequestRepository
{
    public function getAllResearchRequests();
    public function getAllResearchRequestById($id);
    public function createResearchRequest(array $data);
    public function updateResearchRequest(array $data, $id);
    public function deleteResearchRequest($id);
}
