<?php

namespace App\Http\Services;

use App\Http\Repositories\ResearchRequestRepository;

class ResearchRequestService
{
    private ResearchRequestRepository $researchRepository;

    public function __construct(ResearchRequestRepository $researchRepository)
    {
        $this->researchRepository = $researchRepository;
    }

    public function researchRequests()
    {
        return $this->researchRepository->getAllResearchRequests();
    }
}
