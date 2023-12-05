<?php

namespace App\Http\Services;

use App\Http\Repositories\EducationLevelRepository;
use Exception;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\OrderRepository;

class OrderService
{
    private OrderRepository $orderRepository;
    private EducationLevelRepository $educationLevelRepository;

    public function __construct(OrderRepository $orderRepository, EducationLevelRepository $educationLevelRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->educationLevelRepository = $educationLevelRepository;
    }

    public function orderResearch()
    {
        return $this->educationLevelRepository->getAllEducationLevels();
    }

    public function storeOrder(OrderRequest $request)
    {
        try {
            $formFields = $request->validated();
            $userId = Auth::guard('web')->user()->id;

            $data = [
                'phone' => $formFields['phone'],
                'education_level_id' => $formFields['education_level'],
                'research_topic' => $formFields['research_topic'],
                'teacher_name' => $formFields['teacher_name'],
                'notes' => $formFields['notes'],
                'user_id' => $userId
            ];

            $this->orderRepository->createOrder($data);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
