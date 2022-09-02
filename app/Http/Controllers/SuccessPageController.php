<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\key;
use App\Models\Order;
use App\Mail\OrderShipped;
use App\Models\Order_products;
use App\Models\KeysAwaitingPayment;
use Illuminate\Support\Facades\Mail;

class SuccessPageController extends Controller
{

    public function indexResult()
    {
        $payment = new \Idma\Robokassa\Payment(
            'Teeter-totter',
            'jBJHRU39ZDjq8USUx2Z1',
            'sqq3c1iqTjDYz360VVQR',
            true
        );

        if ($payment->validateResult($_POST)) {
            $order = Order::find($payment->getInvoiceId());
            if ($payment->getSum() == $order->totalPrice) {
                $order_keys = KeysAwaitingPayment::where("order_id", $order->id);
                $order->state = true;
                $order->save();
                Mail::to($order->email)->send(new OrderShipped($order_keys->get(), $order));
                foreach ($order_keys->get() as  $key) {
                    $key->delete();
                }
                $order_keys->delete();
            }
        }

        echo $payment->getSuccessAnswer();
    }

    public function indexFail()
    {
        $payment = new \Idma\Robokassa\Payment(
            'Teeter-totter',
            'jBJHRU39ZDjq8USUx2Z1',
            'sqq3c1iqTjDYz360VVQR',
            true
        );

        $order = Order::find($payment->getInvoiceId());
        if ($payment->getSum() == $order->total_price) {
            $order_keys = KeysAwaitingPayment::where("order_id", $order->id);

            foreach ($order_keys as $key) {
                key::create([
                    'key' => $key->key,
                    'key_price' => $key->key_price,
                    'product_id' => $order->order_product_id,
                ]);

                $key->delete();
            }
            return view('robokassa.payment_fail');
        }
    }

    public function indexSuccess()
    {
        $payment = new \Idma\Robokassa\Payment(
            'Teeter-totter',
            'jBJHRU39ZDjq8USUx2Z1',
            'sqq3c1iqTjDYz360VVQR',
            true
        );

        if ($payment->validateSuccess($_POST)) {
            $order = Order::find($payment->getInvoiceId());
            if ($payment->getSum() == $order->total_price) {
                return view('robokassa.payment_success');
            }
        }
    }
}
