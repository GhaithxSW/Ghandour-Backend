<?php

namespace App\Http\Repositories;

interface OrderRepository
{
    public function getAllOrders();
    public function getOrderById($id);
    public function createOrder(array $data);
    public function updateOrder(array $data, $id);
    public function deleteOrder($id);
}
