<?php

namespace App\Http\Services\Admin;

use App\Http\Repositories\OrderRepository;

class OrderService
{
    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function researchRequests()
    {
        return $this->orderRepository->getAllOrders();
    }
}
