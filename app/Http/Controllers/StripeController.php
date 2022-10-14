<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Session;

class StripeController extends Controller
{
    //
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 12*100,
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => "This is test payment",
        ]);
   
        Session::flash('success', 'Payment Successful !');
           
        return back();
    }
}
