<?php

namespace App\Http\Services;

use App\Http\Repositories\ResearchRepository;

class ResearchService
{
    private ResearchRepository $researchRepository;

    public function __construct(ResearchRepository $researchRepository)
    {
        $this->researchRepository = $researchRepository;
    }

    public function researchSamples()
    {
        return $this->researchRepository->getAllResearches();
    }

    public function viewResearch($id)
    {
        return $this->researchRepository->getResearchById($id);
    }
}
