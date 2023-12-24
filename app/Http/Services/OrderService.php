<?php

namespace App\Http\Services;

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\EducationLevelRepository;
use Illuminate\Support\Facades\Session;

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


            \Stripe\Stripe::setApiKey('sk_test_51NEs22D5A1mRGhgDwzahElqIvUD33rsQxBFmv8TeBB9H3S1BkS6KbfD00cbi9aJDfaIyAndrWf4kzr2qFVWPo1FC0018bi3Zax');
            $customer = \Stripe\Customer::create(array(
                "address" => [
                    "line1" => "Virani Chowk",
                    "postal_code" => "360001",
                    "city" => "Rajkot",
                    "state" => "GJ",
                    "country" => "IN",
                ],
                "email" => "demo@gmail.com",
                "name" => "Hardik Savani",
                "source" => $request->stripeToken
            ));
            \Stripe\Charge::create([
                "amount" => 100 * 100,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => "Test payment from raviyatechnical.",
                "shipping" => [
                    "name" => "Jenny Rosen",
                    "address" => [
                        "line1" => "510 Townsend St",
                        "postal_code" => "98140",
                        "city" => "San Francisco",
                        "state" => "CA",
                        "country" => "US",
                    ],
                ]
            ]);
            // Session::flash('success', 'Payment successful!');
            // return back();

        } catch (Exception $e) {
            throw $e;
        }
    }
}
