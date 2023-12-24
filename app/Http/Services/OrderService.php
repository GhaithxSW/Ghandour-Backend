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


            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $customer = \Stripe\Customer::create(array(
                "address" => [
                    "line1" => "Virani Chowk",
                    "postal_code" => "360001",
                    "city" => "Rajkot",
                    "state" => "GJ",
                    "country" => $user->country,
                ],
                "email" => $user->email,
                "name" => $user->first_name . ' ' . $user->last_name,
                "source" => $request->stripeToken
            ));
            \Stripe\Charge::create([
                "amount" => 100 * 100,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => "Test payment from " . $user->first_name,
                "shipping" => [
                    "name" => "LEADING CITIES",
                    "address" => [
                        "line1" => "510 Townsend St",
                        "postal_code" => "98140",
                        "city" => "San Francisco",
                        "state" => "CA",
                        "country" => "US",
                    ],
                ]
            ]);
            Session::flash('success', 'Payment successful!');
            // return back();

        } catch (Exception $e) {
            throw $e;
        }
    }
}
