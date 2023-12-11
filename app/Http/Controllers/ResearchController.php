<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Http\Services\ResearchService;

class ResearchController extends Controller
{
    private ResearchService $researchService;

    public function __construct(ResearchService $researchService)
    {
        $this->researchService = $researchService;
    }

    public function researchSamples()
    {
        $researches = $this->researchService->researchSamples();
        $locale = App::getLocale();
        return ($locale == 'en') ? view('pages.index', ['title' => __('trans.bhoothat')], ['researches' => $researches]) : view('pages-rtl.index', ['title' => __('trans.bhoothat')], ['researches' => $researches]);
    }

    public function showResearch($id)
    {
        $research = $this->researchService->viewResearch($id);
        $locale = App::getLocale();
        return ($locale == 'en') ? view('pages.research-details', ['title' => __('trans.bhoothat')], ['research' => $research]) : view('pages-rtl.research-details', ['title' => __('trans.bhoothat')], ['research' => $research]);
    }
}
