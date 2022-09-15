<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\key;
use App\Models\Order;
use App\Mail\OrderShipped;
use App\Models\Order_products;
use App\Models\KeysAwaitingPayment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Cast\String_;

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
            if ($payment->getSum() == $order->total_price) {
                $order_keys = KeysAwaitingPayment::where("order_id", $order->id);
                $order->state = true;
                $order->save();
                Mail::to($order->email)->send(new OrderShipped($order_keys->get(), $order));
                $order_keys->delete();
                $this->register_user($order->email);
                echo $payment->getSuccessAnswer();
            }
        }

        return redirect()->route('paymentFail');
    }

    public function register_user(string $email)
    {
        if (!User::where('email', '=', $email)->first()) {
            User::create([
                'email' => $email,
                'role_id' => 3,
            ]);
            return back();
        }
    }

    public function indexFail()
    {
        $payment = new \Idma\Robokassa\Payment(
            'Teeter-totter',
            'jBJHRU39ZDjq8USUx2Z1',
            'sqq3c1iqTjDYz360VVQR',
            true
        );
        $order = Order::find($_POST['InvId']);
        if ($_POST['OutSum'] == $order->total_price) {
            $order_keys = KeysAwaitingPayment::where("order_id", $order->id)->get();
            foreach ($order_keys as $key) {
                key::create([
                    'key' => $key->key,
                    'key_price' => $key->key_price,
                    'product_id' => $key->product_id,
                ]);

                KeysAwaitingPayment::where('id', $key->id)->delete();
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
                // $xml = simplexml_load_file($payment->getPaymentStateUrl($_POST));
                // dd($xml);
                return view('robokassa.payment_success');
            }
        }
    }
}
