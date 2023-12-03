<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function index()
    {
        if (app()->getLocale() == 'en') return view('pages.index', ['title' => __('trans.bhoothat')]);
        if (app()->getLocale() == 'ar') return view('pages-rtl.index', ['title' => __('trans.bhoothat')]);
    }

    public function clear()
    {
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        return 'cleared';
    }

    public function requestResearch()
    {
        if (app()->getLocale() == 'en') return view('pages.request-research', ['title' => __('trans.bhoothat')]);
        // if (app()->getLocale() == 'ar') return view('pages-rtl.index', ['title' => __('trans.bhoothat')]);
    }
}
