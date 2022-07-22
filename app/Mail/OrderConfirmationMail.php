<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public $shippingAddress;
    public $orderProducts;
    public $user;

    public function __construct($orderInformation)
    {
        $this->order = $orderInformation['order'];
        $this->shippingAddress = $orderInformation['shippingAddress'];
        $this->orderProducts = $orderInformation['orderProducts'];
        $this->user = $orderInformation['user'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $subject = "Nice choice! Your order " . $this->order['id'] . " is confirmed";
        return $this->markdown('emails.order_confirmation')->subject($subject);
    }
}