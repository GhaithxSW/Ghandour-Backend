<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ResearchService;
use App\Http\Requests\Admin\ResearchRequestRequest;

class ResearchController extends Controller
{
    private ResearchService $researchService;

    public function __construct(ResearchService $researchService)
    {
        $this->researchService = $researchService;
    }

    public function researches()
    {
        $researches = $this->researchService->researches();
        return view('admin.pages.researches.all', ['title' => __('trans.bhoothat')], ['researches' => $researches]);
    }

    public function viewResearch($id)
    {
        $research = $this->researchService->getResearch($id);
        return view('admin.pages.researches.view', ['title' => __('trans.bhoothat')], ['research' => $research]);
    }

    public function viewCreateResearch()
    {
        return view('admin.pages.researches.add', ['title' => __('trans.bhoothat')]);
    }

    public function addResearch(ResearchRequestRequest $request)
    {
        $this->researchService->addResearch($request);
        return redirect()->back()->with('success', __('trans.msg_request_success'));
    }

    public function viewUpdateResearch($id)
    {
        $research = $this->researchService->getResearch($id);
        return view('admin.pages.researches.edit', ['title' => __('trans.bhoothat')], ['research' => $research]);
    }

    public function editResearch(ResearchRequestRequest $request, $id)
    {
        $this->researchService->editResearch($request, $id);
        return redirect()->back()->with('success', __('trans.msg_request_success'));
    }

    public function deleteResearch($id)
    {
        $this->researchService->deleteResearch($id);
        return redirect()->back()->with('success', __('trans.msg_request_success'));
    }
}
