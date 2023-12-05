<?php

namespace App\Http\Controllers;

use App\Http\Services\ResearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    private ResearchService $researchService;

    public function __construct(ResearchService $researchService)
    {
        $this->researchService = $researchService;
    }

    public function index()
    {
        $researches = $this->researchService->researchSamples();

        if (app()->getLocale() == 'en') return view('pages.index', ['title' => __('trans.bhoothat')], ['researches' => $researches]);
        if (app()->getLocale() == 'ar') return view('pages-rtl.index', ['title' => __('trans.bhoothat')], ['researches' => $researches]);
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

    // public function index()
    // {
    //     $services = Service::all();
    //     $subCategories = SubCategory::all();
    //     $categories = Category::all();
    //     $clients = Client::all();
    //     $maintenances = MaintenanceTechnician::all();
    //     $maintenancesJoinRequests = MaintenanceTechnician::where('is_verified', 0)->get();

    //     $orders = Order::all();
    //     $finished = Order::where('status', OrderStatus::finished)->get();
    //     $processing = Order::where('status', OrderStatus::processing)->get();
    //     $canceled = Order::where('status', OrderStatus::canceled)->get();
    //     $other = Order::whereIn('status', [OrderStatus::newOrder, OrderStatus::pendingClientApprove, OrderStatus::pendingClientApproveFinish, OrderStatus::pendingMaintenanceConfirm])->get();

    //     $totalPrice = 0.0;
    //     foreach ($orders as $order) {
    //         foreach ($order->orderServices as $orderService) {
    //             $totalPrice += $orderService->service->price * $orderService->quantity;
    //         }
    //     }

    //     return view('dashboard', [
    //         'services' => $services,
    //         'subCategories' => $subCategories,
    //         'categories' => $categories,
    //         'clients' => $clients,
    //         'maintenances' => $maintenances,
    //         'maintenancesJoinRequests' => $maintenancesJoinRequests,
    //         'finished' => $finished,
    //         'processing' => $processing,
    //         'canceled' => $canceled,
    //         'other' => $other,
    //         'totalPrice' => $totalPrice,
    //     ]);
    // }

    // public function clear()
    // {
    //     Artisan::call('config:cache');
    //     Artisan::call('cache:clear');
    //     Artisan::call('view:clear');
    //     return 'cleared';
    // }

    // public function getSubCategory($id)
    // {
    //     $service = Service::findOrFail($id);
    //     return (string) $service->subCategory->id;
    // }

    // public function getMainCategory($id)
    // {
    //     $service = Service::findOrFail($id);
    //     return (string) $service->subCategory->category->id;
    // }

    // public function settings()
    // {
    //     // return view('name', $data)->render();
    //     $distance = Distance::where('is_current', 1)->first();
    //     return view('pages.settings.index', ['distance' => $distance]);
    // }
}
