<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\key;
use App\Models\personal_discount;
use App\Models\Product;
use App\Models\product_user;
use App\Models\Order;
use App\Models\Order_products;
use App\Models\KeysAwaitingPayment;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\ErrorHandler\Debug;

class ShoppingCartController extends Controller
{

    public function index()
    {
        $price = 0;
        $shopping_cart_products = [];
        $personal_disounts = personal_discount::all();
        $products = collect([]);
        $product_users = collect();
        if(Auth::check()){
            $product_users = product_user::where('user_id', Auth::id())->get();
        }
        //Добавление id продуктов, которые были добавлены в корзину к массиву
        if (Auth::check()) {
            $shopping_cart_products = product_user::where('user_id', Auth::id())->get();
            $shopping_cart_products = $shopping_cart_products->map(function ($product) {
                return collect($product->toArray())->only('product_id')->all();
            });
        } else {
            $shopping_cart_products = session('shopping_cart_products');
        }
        //Добавление продуктов в коллецию для дальнейшей работы с ней
        if (collect($shopping_cart_products)->count() > 0) {
            $products = Product::where(function ($query) use ($shopping_cart_products) {
                foreach ($shopping_cart_products as $id) {
                    $query->orWhere('id', $id);
                }
            })->paginate(10);
        } else {
            $products = Product::where('id', 0)->paginate(10);
        }

        //Вычисление итоговой цены
        foreach ($products as $product) {
            $price += $product->price - ($product->price / 100) * ($product->discount == null ? 0 : $product->discount->discount);
        }

        return view('shopping_cart', compact('products', 'product_users', 'price', 'personal_disounts'));
    }

    public function product_to_cart($product_id)
    {
        if (Auth::check()) {
            $this->update_cart_auth_user($product_id);
            return response(product_user::where('user_id', Auth::id())->count(),200);
        } else {
            $this->update_cart_session($product_id);
            return response(count(session('shopping_cart_products',[])),200);
        }
    }

    #region MethodsOfProductToCartFunction
    private function update_cart_auth_user($product_id)
    {
        if (product_user::where('product_id', $product_id)->where('user_id', Auth::id())->first()) {
            $this->remove_product_from_cart_auth_user($product_id);
        } else {
            $this->add_product_to_cart_auth_user($product_id);

        }
    }

    private function remove_product_from_cart_auth_user($product_id)
    {
        product_user::where('product_id', $product_id)->where('user_id', Auth::id())->delete();
    }

    private function add_product_to_cart_auth_user($product_id)
    {
        product_user::create([
            'user_id' => Auth::id(),
            'product_id' => $product_id,
        ]);
    }

    private function update_cart_session($product_id)
    {
        $shopping_cart_products = session('shopping_cart_products') ? session('shopping_cart_products') : [];
        if (in_array($product_id, $shopping_cart_products)) {
            $this->remove_product_from_cart_session($product_id);
        } else {
            $this->add_product_to_cart_session($product_id, $shopping_cart_products);
        }
    }

    private function remove_product_from_cart_session($product_id)
    {
        $shopping_cart_products = session('shopping_cart_products') ? session('shopping_cart_products') : [];
        array_splice($shopping_cart_products, array_search($product_id, $shopping_cart_products), 1);
        session(['shopping_cart_products' =>  $shopping_cart_products]);
    }

    private function add_product_to_cart_session($product_id, $shopping_cart_products)
    {
        array_push($shopping_cart_products, $product_id);
        session(['shopping_cart_products' =>  $shopping_cart_products]);
    }
    #endregion

    public function delete_product_from_card($id)
    {
        if (Auth::check()) {
            if (product_user::where('user_id', Auth::id())->where('product_id', $id)->first()->user_id == Auth::id()) {
                product_user::where('user_id', Auth::id())->where('product_id', $id)->delete();
            }
        } else {
            $shopping_cart_products = session('shopping_cart_products');
            $shopping_cart_products = array_diff($shopping_cart_products, [$id]);
            session(['shopping_cart_products' =>  $shopping_cart_products]);
        }

        return back();
    }

    public function buy(Request $req)
    {
        $order = Order::create([
            'email' => $req->email,
            'total_price' => 0,
        ]);
        $price = 0;
        $description = "";
        $payment = new \Idma\Robokassa\Payment(
            'Teeter-totter',
            'jBJHRU39ZDjq8USUx2Z1',
            'sqq3c1iqTjDYz360VVQR',
            true
        );

        foreach ($req->games as $game) {
            $product = Product::where('id', $game)->first();
            $count = $req['count' . $game];
            Order_products::create([
                'order_id' => $order->id,
                'product_id' => $game,
                'count' => $count,
            ]);
            $price += ($product->price - ($product->price / 100) * ($product->discount == null ? 0 : $product->discount->discount)) * $count;
            $description .= 'После оплаты, товар будет выслан на указанную почту: ' . $order->email;
        }
        $order->total_price = $price;
        $order->save();
        $order_products = Order_products::where('order_id', $order->id)->get();

        foreach ($order_products as $order_product) {
            for ($i = 0; $i < $order_product->count; $i++) {
                if ($order_product->Product->keys()->first() == null) {

                    $keysOfUserAwaitingPayment = KeysAwaitingPayment::where("order_id", $order->id);
                    foreach ($keysOfUserAwaitingPayment as $key) {
                        key::create([
                            "product_id" => $keysOfUserAwaitingPayment->product_id,
                            "key" => $keysOfUserAwaitingPayment->key,
                            "key_price" => $keysOfUserAwaitingPayment->key_price,
                        ]);
                    }
                    return redirect()->back(); //На данный момент ключа к игре в магазине нет
                }

                $key = $order_product->Product->keys()->first();
                KeysAwaitingPayment::create([
                    "order_id" => $order->id,
                    "product_id" => $key->product_id,
                    "key" => $key->key,
                    "key_price" => $key->key_price,
                ]);
                key::where("key", $key->key)->first()->delete();
            }
        }

        $payment
            ->setInvoiceId($order->id)
            ->setSum($price)
            ->setDescription($description);

        return redirect($payment->getPaymentUrl());
    }
}
