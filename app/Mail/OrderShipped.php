<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order_products;
use Ramsey\Uuid\Type\Integer;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * @var Illuminate\Database\Eloquent\Collection
     */

    public $order_products;
    public $order;

    /**
     * Create a new message instance.
     *
     * @param   $order_products
     * @return void
     */
    public function __construct(Collection $order_products, Order $order)
    {
        $this->order = $order;
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
