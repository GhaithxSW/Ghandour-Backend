<?php

namespace App\Http\Repositories;

use App\Models\Research;

class ResearchRepositoryImpl implements ResearchRepository
{
    public function getAllResearches()
    {
        return Research::orderBy('id', 'desc')->get();
    }

    public function getResearches()
    {
        return Research::orderBy('id', 'desc')->paginate(4);
    }

    public function getResearchById($id)
    {
        return Research::findOrFail($id);
    }

    public function createResearch(array $data)
    {
        return Research::create($data);
    }

    public function updateResearch(array $data, $id)
    {
        return Research::whereId($id)->update($data);
    }

    public function deleteResearch($id)
    {
        return Research::destroy($id);
    }
}
