<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\OrderService;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function orders()
    {
        $orders = $this->orderService->orders();
        return view('admin.pages.orders.all', ['title' => 'الطلبات'], ['orders' => $orders]);
    }

    public function orderDetails($id)
    {
        $order = $this->orderService->orderDetails($id);
        return view('admin.pages.orders.view', ['title' => 'تفاصيل الطلب'], ['order' => $order]);
    }

    public function deleteOrder($id)
    {
        $this->orderService->deleteOrder($id);
        return redirect()->back()->with('success', 'تم حذف الطلب بنجاح');
    }
}
