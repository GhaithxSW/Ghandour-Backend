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

    public function orders()
    {
        return $this->orderRepository->getAllOrders();
    }

    public function orderDetails($id)
    {
        return $this->orderRepository->getOrderById($id);
    }

    public function deleteOrder($id)
    {
        $this->orderRepository->deleteOrder($id);
    }
}
