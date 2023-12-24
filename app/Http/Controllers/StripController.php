<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class StripController extends Controller
{
    public function stripe()
    {
        if (App::getLocale() == 'en')
            return view('pages.stripe', ['title' => __('trans.bhoothat')]);
        if (App::getLocale() == 'ar')
            return view('pages-rtl.stripe', ['title' => __('trans.bhoothat')]);
    }

    // public function stripePost(Request $request)
    // {
    //     \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    //     \Stripe\Charge::create([
    //         "amount" => 100 * 100,
    //         "currency" => "usd",
    //         "source" => $request->stripeToken,
    //         "description" => "Test payment from raviyatechnical"
    //     ]);

    //     Session::flash('success', 'Payment successful!');

    //     return back();
    // }

    public function stripePost(Request $request)
    {
        // try {
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
        Session::flash('success', 'Payment successful!');
        return back();
        // } catch (Exception $e) {
        //     throw $e;
        // }
    }
}
