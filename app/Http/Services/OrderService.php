<?php

namespace App\Http\Services;

use Exception;
use Stripe\Charge;
use Stripe\Payout;
use Stripe\Stripe;
use Stripe\Customer;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\OrderRepository;

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

            $grades = [
                isset($formFields['middle_grade']) ? $formFields['middle_grade'] : null,
                isset($formFields['high_grade']) ? $formFields['high_grade'] : null,
                isset($formFields['university_year']) ? $formFields['university_year'] : null,
                isset($formFields['graduate_study']) ? $formFields['graduate_study'] : null,
            ];
            $grade = $this->getLastFilledElement($grades);

            $schoolsOrUniversities = [
                isset($formFields['school']) ? $formFields['school'] : null,
                isset($formFields['university']) ? $formFields['university'] : null,
            ];
            $schoolOrUniversity = $this->getLastFilledElement($schoolsOrUniversities);

            $orderData = [
                'research_topic' => $formFields['research_topic'],
                'teacher_name' => $formFields['teacher_name'],
                'research_papers_count' => $formFields['research_papers_count'],
                'research_lang' => $formFields['research_lang'],
                'delivery_date' => $formFields['delivery_date'],
                'user_id' => $user->id,
                'education_level' => $formFields['education_level'],
                'grade' => $grade,
                'school_university' => $schoolOrUniversity,
                'notes' => $formFields['notes'],
            ];

            $this->orderRepository->createOrder($orderData);
            $this->stripePayment($user);
            // $this->stripePayout();
            Session::flash('success', __('trans.msg_request_success'));
        } catch (Exception $e) {
            throw $e;
        }
    }

    private function getLastFilledElement($data)
    {
        $filledData = implode(', ', array_filter($data, function ($value) {
            return $value !== null;
        }));
        $filledDataArray = explode(', ', $filledData);
        $lastDataElement = end($filledDataArray);
        return $lastDataElement;
    }

    private function stripePayment($user)
    {
        Stripe::setApiKey(config('stripe.stripe_secret'));

        // $token = $request->input('stripeToken');
        $token = request('stripeToken');

        $customer = Customer::create(array(
            // "address" => [
            //     "line1" => "Virani Chowk",
            //     "postal_code" => "360001",
            //     "city" => "Rajkot",
            //     "state" => "GJ",
            //     "country" => $user->country,
            // ],
            "email" => $user->email,
            "name" => $user->first_name . ' ' . $user->last_name,
            "source" => $token
        ));
        Charge::create([
            "amount" => 10 * 100,
            "currency" => "aed",
            "customer" => $customer->id,
            "description" => "Payment from " . $user->first_name . ' ' . $user->last_name,
            // "shipping" => [
            //     "name" => "Jenny Rosen",
            //     "address" => [
            //         "line1" => "510 Townsend St",
            //         "postal_code" => "98140",
            //         "city" => "San Francisco",
            //         "state" => "CA",
            //         "country" => "US",
            //     ],
            // ]
        ]);
    }

    private function stripePayout()
    {
        Payout::create([
            "amount" => 10 * 100,
            "currency" => "aed",
            "destination" => "0012259204001",
        ]);
    }
}
