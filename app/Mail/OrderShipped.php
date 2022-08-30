<?php

namespace App\Mail;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order_products;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * @var Illuminate\Database\Eloquent\Collection
     */

    public $order_products;

    /**
     * Create a new message instance.
     *
     * @param   $order_products
     * @return void
     */
    public function __construct(Collection $order_products)
    {
        $this->order_products = $order_products;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.Payment');
    }
}
