<x-app-no-nav-no-footer>
@component('mail::message')
# Order Confirmation

Thank you for your order! Here are the details:

Order ID: {{ $order->id }}
Date: {{ $order->created_at->format('Y-m-d H:i:s') }}
Total: {{ $order->total }}

<div>
    Price: {{ $order->price }}
</div>

Shipping Address:
{{ $order->shipping_address }}

Billing Address:
{{ $order->billing_address }}

Items:
@foreach ($order->items as $item)
- {{ $item->name }} ({{ $item->quantity }}) - ${{ $item->price }}
@endforeach

If you have any questions, please contact our support team.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
</x-app-no-nav-no-footer>
{{--  OrderConfermation.php  --}}
{{--  <?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @param  mixed  $order
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.order_confirmation')
                    ->subject('Order Confirmation');
    }
}  --}}

{{--  Using the facade  --}}
{{--  
Step 4: Sending the Email To send the order confirmation email, you can utilize the Mail facade in your Laravel application. Here's an example of how you can send the email:

use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;

// Assuming you have an $order object representing the order
Mail::to($order->email)->send(new OrderConfirmation($order));  --}}