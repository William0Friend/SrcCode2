<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Cashier\PaymentMethod;
use Money\Exception;
use Stripe\Exception\CardException;
use Stripe\PaymentIntent;
use Stripe;
use App\Models\Payment;

class PaymentController extends Controller
{

    public function index()
    {
        return view('payment');
    }
 
    public function pay(Request $request)
    {

        // Replace with your secret key, found in your Stripe dashboard
        Stripe\Stripe::setApiKey('sk_test_51NPYIhID64klxtaYLgvN0coztWgDRkySdfZZxO6zibLqKzeQszKaQRKUxnVmOZb5VjPsiz0hKhZmjvQZgOEhiAX700lYvXUT1b'); 

        function calculateOrderAmount(array $items): int {
            return 499;
        }

        header('Content-Type: application/json');

        try {

            $jsonStr = file_get_contents('php://input');
            $jsonObj = json_decode($jsonStr);

            $paymentIntent = Stripe\PaymentIntent::create([
                'amount' => calculateOrderAmount($jsonObj->items),
                'currency' => 'gbp', // Replace with your country's primary currency
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
                // Remove if you don't want to send automatic email receipts after successful payment
                "receipt_email" => $request->email 
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            echo json_encode($output);
        } catch (Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }
    public function show()
    {
        return view('payment.checkout');
    }

    public function store(Request $request)
    {
        $stripeSecretKey = env('STRIPE_SECRET');

        Stripe::setApiKey($stripeSecretKey);

        $paymentIntent = PaymentIntent::create([
            'amount' => $this->calculateOrderAmount($request->items),
            'currency' => 'usd',
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);

        return response()->json([
            'clientSecret' => $paymentIntent->client_secret,
        ]);
    }

    private function calculateOrderAmount(array $items): int
    {// Replace this with the actual calculation logic.
        return $items[0]['quantity'] * 100; 
    }
    public function makePayment(Request $request)
    {
        // Retrieve user
        $user = User::find(auth()->id());
        
        // Fetch the payment details from the request
        $cardNumber = $request->input('card_number');
        $expiryDate = $request->input('expiry_date');
        $cvv = $request->input('cvv');

        // Split the expiry date into month and year
        [$expMonth, $expYear] = explode('/', $expiryDate);

        // Create Stripe PaymentMethod
        try {
            $paymentMethod = PaymentMethod::create([
                'type' => 'card',
                'card' => [
                    'number' => $cardNumber,
                    'exp_month' => $expMonth,
                    'exp_year' => $expYear,
                    'cvc' => $cvv,
                ],
            ]);

            // Attach the payment method to the customer
            $paymentMethod->attach($user->stripe_id);

            // Set the payment method as the user's default
            $user->updateDefaultPaymentMethod($paymentMethod->id);

            // Redirect to success page
            return redirect()->route('payment.success');
            
        } catch (CardException $e) {
            // Catch any errors related to the payment card
            return redirect()->route('payment.failed');
        }
    }
    public function charge(Request $request)
    {
        $amount = $request->input('amount');
        $description = $request->input('description');

        $user = User::find(auth()->id());
        
        // Assumes the user has a valid default payment method
        try {
            $user->charge($amount, $user->defaultPaymentMethod()->id, [
                'description' => $description,
            ]);

            // if the charge was successful, redirect to success page
            return redirect()->route('payment.success');
            
        } catch (Exception $e) {
            // Catch any error regarding payment
            return redirect()->route('payment.failed');
        }
    }
//     public function charge(Request $request)
// {
//     $amount = $request->input('amount');
//     $description = $request->input('description');

//     $user = User::find(auth()->id());
    
//     try {
//         $user->charge($amount, [
//             'description' => $description,
//         ]);

//         return redirect()->route('payment.success');
        
//     } catch (Exception $e) {
//         return redirect()->route('payment.failed');
//     }
// }
}
