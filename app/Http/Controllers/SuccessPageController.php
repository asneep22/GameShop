<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

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

            if ($payment->getSum() == $order->totalPrice) {
                $order->update(['state' => true]);
                dd('okay');
            }
        }

        return view("payment_success");
    }
}
