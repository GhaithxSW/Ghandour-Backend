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
            // $userId = Auth::guard('web')->user()->id;

            $userData = [
                'first_name' => $formFields->first_name,
                'last_name' => $formFields->last_name,
                'phone' => $formFields->phone,
                'email' => $formFields->email
            ];

            $user = $this->userRepository->createUser($userData);

            $orderData = [
                'education_level_id' => $formFields['education_level'],
                'research_topic' => $formFields['research_topic'],
                'teacher_name' => $formFields['teacher_name'],
                'research_lang' => $formFields['research_lang'],
                'research_duration' => $formFields['research_duration'],
                'notes' => $formFields['notes'],
                'user_id' => $user->id
            ];

            // $phone = ['phone' => $formFields['phone']];
            $this->orderRepository->createOrder($orderData);

            // $this->userRepository->updateUser($phone, $userId);

        } catch (Exception $e) {
            throw $e;
        }
    }
}
