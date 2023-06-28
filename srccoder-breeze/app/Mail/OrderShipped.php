<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
       public Order $order,
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new \Illuminate\Mail\Mailables\Address('william0friend@gmail.com', 'William Friend'),
            replyTo: [
                new \Illuminate\Mail\Mailables\Address('william0friend@gmail.com', 'William Friend'),
            ],
            subject: 'Order Shipped',
        );
    }

    /**
     * Get the message content definition.
     */
    /**
 * Get the message content definition.
 */
public function content(): Content
{
    // return new Content(
    //     view: 'emails.orders.shipped',
    //     text: 'emails.orders.shipped-text',
    //     html: 'emails.orders.shipped',

    // );
    return new Content(
        view: 'emails.orders.shipped',
        with: [
            'orderName' => $this->order->name,
            'orderPrice' => $this->order->price,
        ],
    );
}

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
