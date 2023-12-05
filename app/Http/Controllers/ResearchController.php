<?php

namespace App\Http\Controllers;

use App\Http\Services\ResearchService;
use Illuminate\Http\Request;

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
        if (app()->getLocale() == 'en')
            return view('pages.index', ['title' => __('trans.bhoothat')], ['researches' => $researches]);
        if (app()->getLocale() == 'ar')
            return view('pages-rtl.index', ['title' => __('trans.bhoothat')], ['researches' => $researches]);
    }
}
