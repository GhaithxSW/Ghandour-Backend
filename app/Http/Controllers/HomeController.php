<?php

namespace App\Http\Controllers;

use App\Http\Services\Admin\TeamService;
use App\Http\Services\ResearchService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    private ResearchService $researchService;
    private TeamService $teamService;

    public function __construct(ResearchService $researchService, TeamService $teamService)
    {
        $this->researchService = $researchService;
        $this->teamService = $teamService;
    }

    public function index()
    {
        $members = $this->teamService->members();
        $researches = $this->researchService->researchSamples();
        $locale = App::getLocale();

        return ($locale == 'en') ? view('pages.index', ['title' => __('trans.bhoothat')], ['researches' => $researches, 'members' => $members]) : view('pages-rtl.index', ['title' => __('trans.bhoothat')], ['researches' => $researches, 'members' => $members]);
    }

    public function requestResearch()
    {
        $locale = App::getLocale();
        return ($locale == 'en') ? view('pages.request-research', ['title' => __('trans.bhoothat')]) : view('pages-rtl.request-research', ['title' => __('trans.bhoothat')]);
    }

    public function clear()
    {
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        return 'cleared';
    }
}
