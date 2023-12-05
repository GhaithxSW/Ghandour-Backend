<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Services\OrderService;
use Illuminate\Support\Facades\App;

class OrderController extends Controller
{

    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function orderResearch()
    {
        $educationLevels = $this->orderService->orderResearch();

        $locale = App::getLocale();

        return ($locale == 'en') ? view('pages.request-research', ['title' => __('trans.bhoothat')], ['educationLevels' => $educationLevels]) : view('pages-rtl.request-research', ['title' => __('trans.bhoothat')], ['educationLevels' => $educationLevels]);
    }

    public function storeOrder(OrderRequest $request)
    {
        try {
            $this->orderService->storeOrder($request);
            return redirect()->back()->with('success', __('trans.msg_request_success'));
        } catch (Exception $e) {
            throw $e;
        }
    }
}
