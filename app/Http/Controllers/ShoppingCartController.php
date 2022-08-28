<?php

namespace App\Http\Controllers;

use App\Models\personal_discount;
use App\Models\Product;
use App\Models\product_user;
use App\Models\Order;
use App\Models\Order_products;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $price = 0;
        $shopping_cart_products = [];
        $products = collect([]);
        $personal_disounts = personal_discount::all();
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
            $price += $product->price - ($product->price / 100) * $product->discount;
        }

        return view('shopping_cart', compact('products', 'price', 'personal_disounts'));
    }

    public function add_product_to_cart(Request $req, $product_id)
    {
        if (Auth::check()) {
            $req['user_id'] = Auth::id();
            $req['product_id'] = $product_id;
            product_user::create($req->all());
        } else {
            $shopping_cart_products = session('shopping_cart_products') ? session('shopping_cart_products') : [];
            array_push($shopping_cart_products, $product_id);
            session(['shopping_cart_products' =>  $shopping_cart_products]);
        }

        return back();
    }

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
        $description ="";
        $payment = new \Idma\Robokassa\Payment(
            'Teeter-totter',
            'jBJHRU39ZDjq8USUx2Z1',
            'sqq3c1iqTjDYz360VVQR',
            true
        );

        foreach ($req->games as $game) {
            $product = Product::where('id', $game)->first();
            $count = $req['count'.$game];
            Order_products::create([
                'order_id' => $order->id,
                'product_id' => $game,  
            ]);
            $price += ($product->price - ($product->price / 100) * $product->discount) * $count;
            $description .= $product->title.':'.$count.'шт - '.$price.'руб'."\n";
        }
        $order->update(['total_price', $price]);

        $payment
            ->setInvoiceId($order->id)
            ->setSum($price)
            ->setDescription($description);

        return redirect($payment->getPaymentUrl());
    }
}
