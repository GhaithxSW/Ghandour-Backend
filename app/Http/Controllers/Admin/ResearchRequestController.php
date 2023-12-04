<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ResearchRequestService;

class ResearchRequestController extends Controller
{
    private ResearchRequestService $researchRequestService;

    public function __construct(ResearchRequestService $researchRequestService)
    {
        $this->researchRequestService = $researchRequestService;
    }

    public function researchRequests()
    {
        $requests = $this->researchRequestService->researchRequests();
        return view('admin.pages.research-requests.all', ['title' => __('trans.bhoothat')], ['requests' => $requests]);
    }
}
