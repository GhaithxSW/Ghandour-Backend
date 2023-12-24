<?php

namespace App\Http\Services;

use App\Http\Repositories\EducationLevelRepository;
use Exception;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\UserRepository;

class OrderService
{
    private OrderRepository $orderRepository;
    private EducationLevelRepository $educationLevelRepository;
    private UserRepository $userRepository;

    public function __construct(OrderRepository $orderRepository, EducationLevelRepository $educationLevelRepository, UserRepository $userRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->educationLevelRepository = $educationLevelRepository;
        $this->userRepository = $userRepository;
    }

    public function orderResearch()
    {
        return $this->educationLevelRepository->getAllEducationLevels();
    }

    public function storeOrder(OrderRequest $request)
    {
        try {
            $formFields = $request->validated();
            $userData = [
                'first_name' => $formFields['first_name'],
                'last_name' => $formFields['last_name'],
                'phone' => $formFields['phone'],
                'email' => $formFields['email'],
                'country' => $formFields['country'],
            ];

            $user = $this->userRepository->createUser($userData);

            $orderData = [
                'research_topic' => $formFields['research_topic'],
                'teacher_name' => $formFields['teacher_name'],
                'research_papers_count' => $formFields['research_papers_count'],
                'research_lang' => $formFields['research_lang'],
                'delivery_date' => $formFields['delivery_date'],
                'notes' => $formFields['notes'],
                'user_id' => $user->id,
                'education_level_id' => $formFields['education_level'],
                'grade' => $formFields['grade'],
                'school' => $formFields['school'],
            ];

            $this->orderRepository->createOrder($orderData);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
