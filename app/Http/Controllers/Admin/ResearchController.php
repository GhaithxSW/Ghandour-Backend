<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderRequest;
use App\Http\Services\Admin\ResearchService;

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
        return view('admin.pages.researches.all', ['title' => 'الابحاث'], ['researches' => $researches]);
    }

    public function researchDetails($id)
    {
        $research = $this->researchService->researchDetails($id);
        return view('admin.pages.researches.view', ['title' => 'معلومات البحث'], ['research' => $research]);
    }

    public function viewAddResearch()
    {
        return view('admin.pages.researches.add', ['title' => 'اضافة بحث']);
    }

    public function addResearch(OrderRequest $request)
    {
        $this->researchService->addResearch($request);
        return redirect()->back()->with('success', 'تمت اضافة البحث بنجاح');
    }

    public function viewUpdateResearch($id)
    {
        $research = $this->researchService->researchDetails($id);
        return view('admin.pages.researches.edit', ['title' => 'تعديل البحث'], ['research' => $research]);
    }

    public function updateResearch(OrderRequest $request, $id)
    {
        $this->researchService->updateResearch($request, $id);
        return redirect()->back()->with('success', 'تم تعديل البحث بنجاح');
    }

    public function deleteResearch($id)
    {
        $this->researchService->deleteResearch($id);
        return redirect()->back()->with('success', 'تم حذف البحث بنجاح');
    }
}
