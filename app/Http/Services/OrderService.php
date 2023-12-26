<?php

namespace App\Http\Services;

use Exception;
use App\Http\Requests\OrderRequest;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\OrderRepository;
use Illuminate\Support\Facades\Session;

class OrderService
{
    private OrderRepository $orderRepository;
    private UserRepository $userRepository;

    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
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

            // $grades = [
            //     isset($formFields['middle_grade']) ? $formFields['middle_grade'] : null,
            //     isset($formFields['high_grade']) ? $formFields['high_grade'] : null,
            //     isset($formFields['university_year']) ? $formFields['university_year'] : null,
            //     isset($formFields['graduate_study']) ? $formFields['graduate_study'] : null,
            // ];

            // $filledGrade = array_filter($grades, function ($value) {
            //     return $value !== null;
            // });

            // $schoolOrUniversity = [
            //     isset($formFields['school']) ? $formFields['school'] : null,
            //     isset($formFields['university']) ? $formFields['university'] : null,
            // ];

            // $filledSchoolOrUniversity = array_filter($schoolOrUniversity, function ($value) {
            //     return $value !== null;
            // });

            $orderData = [
                'research_topic' => $formFields['research_topic'],
                'teacher_name' => $formFields['teacher_name'],
                'research_papers_count' => $formFields['research_papers_count'],
                'research_lang' => $formFields['research_lang'],
                'delivery_date' => $formFields['delivery_date'],
                'user_id' => $user->id,
                'education_level' => $formFields['education_level'],
                'grade' => null,
                'school_university' => null,
                'notes' => $formFields['notes'],
            ];

            $this->orderRepository->createOrder($orderData);
            $this->stripePayment($user);

        } catch (Exception $e) {
            throw $e;
        }
    }

    private function stripePayment($user)
    {
        \Stripe\Stripe::setApiKey('sk_test_51NEs22D5A1mRGhgDwzahElqIvUD33rsQxBFmv8TeBB9H3S1BkS6KbfD00cbi9aJDfaIyAndrWf4kzr2qFVWPo1FC0018bi3Zax');
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
            "source" => request('stripeToken')
        ));
        \Stripe\Charge::create([
            "amount" => 10 * 100,
            "currency" => "sar",
            "customer" => $customer->id,
            "description" => "Payment from " . $user->first_name . ' ' . $user->last_name,
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
        Session::flash('success', __('trans.msg_request_success'));
    }
}
