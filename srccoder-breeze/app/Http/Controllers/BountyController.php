<?php

namespace App\Http\Controllers;
use App\Models\Bounty;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Illuminate\Http\Request;

class BountyController extends Controller
{
    //
    public function store(Request $request)
{
    // Validate the request...

    // Create a PaymentIntent
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    $paymentIntent = \Stripe\PaymentIntent::create([
      'bounty' => $request->input('amount') * 100, // Convert to cents
      'currency' => 'usd',
      'payment_method_types' => ['card'],
    //   'description' => 'Bounty for question #' . $request->input('question_id'),
      
    ]);

    // Create the bounty and save the payment intent ID
    $bounty = new Bounty([
        'question_id' => $request->input('question_id'),
        'user_id' => auth()->id(),
        'bounty' => $request->input('amount'),
        'payment_intent_id' => $paymentIntent->id,
        'status' => 1,
    ]);

    $bounty->save();

    // Return the client secret to complete the payment on the frontend
    return response()->json(['clientSecret' => $paymentIntent->client_secret]);
}

}
