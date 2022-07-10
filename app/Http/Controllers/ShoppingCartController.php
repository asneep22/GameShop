<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\product_user;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $price = 0;
        $shopping_cart_products = [];
        $products = collect([]);

        //Добавление id продуктов, которые были добавлены в корзину к массиву 
        if (Auth::check()) {
            $shopping_cart_products = product_user::where('user_id', Auth::id())->get();
            $shopping_cart_products = $shopping_cart_products->map(function ($product) {
                return collect($product->toArray())->only('product_id')->all();
            });
        } else {
            $shopping_cart_products = session('shopping_cart_products', []);
        }

        //Добавление продуктов в коллецию для дальнейшей работы с ней
        $products = Product::where(function ($query) use ($shopping_cart_products) {
            foreach ($shopping_cart_products as $id) {
                $query->orWhere('id', $id);
            }
        })->paginate(10);
        //Вычисление итоговой цены
        foreach ($products as $product) {
            $price += $product->price;
        }


        return view('shopping_cart', compact('products', 'price'));
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

    public function buy(Request $req){
        // dd($req);
        // return back();
    }
}
