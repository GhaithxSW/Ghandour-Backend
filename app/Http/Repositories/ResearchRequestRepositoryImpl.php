<?php

namespace App\Http\Repositories;

use App\Models\ResearchRequest;

class ResearchRequestRepositoryImpl implements ResearchRequestRepository
{
    public function getAllResearchRequests()
    {
        return ResearchRequest::all();
    }

    public function getAllResearchRequestById($id)
    {
        return ResearchRequest::findOrFail($id);
    }

    public function createResearchRequest(array $data)
    {
        return ResearchRequest::create($data);
    }

    public function updateResearchRequest(array $data, $id)
    {
        return ResearchRequest::whereId($id)->update($data);
    }

    public function deleteResearchRequest($id)
    {
        return ResearchRequest::destroy($id);
    }
}
