<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Admin\OrderService;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function researchRequests()
    {
        $requests = $this->orderService->researchRequests();
        return view('admin.pages.research-requests.all', ['title' => __('trans.bhoothat')], ['requests' => $requests]);
    }
}
