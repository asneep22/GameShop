<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Mail\OrderShipped;
use App\Models\Order_products;
use App\Models\KeysAwaitingPayment;
use  Mail;

class SuccessPageController extends Controller
{
    public function index()
    {
        $payment = new \Idma\Robokassa\Payment(
            'Teeter-totter',
            'jBJHRU39ZDjq8USUx2Z1',
            'sqq3c1iqTjDYz360VVQR',
            true
        );

        if ($payment->validateSuccess($_GET)) {
            $order = Order::find($payment->getInvoiceId());
            $order_keys = KeysAwaitingPayment::where("order_id", $order->id);

            if ($payment->getSum() == $order->totalPrice) {
                $order->state = true;
                $order->save();
                Mail::to($order->email)->send(new OrderShipped($order_keys));
                foreach ($order_keys as  $key) {
                    $key->delete();
                }
                $order_keys->delete();
                return view("payment_success");
            }
        }
    }
}
