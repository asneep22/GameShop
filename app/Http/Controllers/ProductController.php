<?php

namespace App\Http\Controllers;

use App\Models\genre_product;
use App\Models\Product;
use App\Models\product_material;
use App\Models\product_user;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index($id)
    {
        $product_is_on_shopping_cart = false;
        $materials = product_material::where('product_id', $id)->get();
        $product = Product::with(['genres', 'oses', 'videocard', 'cpu'])->find($id);
        $reviews = Review::where('product_id', $id)->where('review_id', null)->latest()->paginate(5);
        $reviewsOnRevew = Review::where('product_id', $id)->whereNotNull('review_id')->get();
        $product_users = collect();
        if(Auth::check()){
            $product_users = product_user::where('user_id', Auth::id())->get();
        }
        $product_users = product_user::all();
        $dlcs = Product::where('product_id', $id)->get();
        $similar_games = Product::with(['genres', 'oses', 'videocard', 'cpu'])->join('genre_products', 'genre_products.product_id', '=', 'products.id')->select('products.*')
            ->where(function ($query) use ($product) {
                foreach ($product->genres as $key => $genre) {
                    $query->orWhere('genre_products.genre_id', '=', $genre->id);
                }
            })->whereNot('products.id', '=', $id)->distinct()->inRandomOrder()->limit(5)->get();

        $product_user_in_the_shop_cart = product_user::where('user_id', Auth::id())->get();
        if (Auth::check()) {
            foreach ($product_user_in_the_shop_cart as $shopping_cart_product) {
                if ($shopping_cart_product->product_id == $product->id) {
                    $product_is_on_shopping_cart = true;
                }
            }
        } else {
            if (session('shopping_cart_products')) {
                foreach (session('shopping_cart_products') as $shopping_cart_product_id) {
                    if ($shopping_cart_product_id == $product->id) {
                        $product_is_on_shopping_cart = true;
                    }
                }
            }
        }


        return view('product', compact('materials', 'product', 'product_users', 'similar_games', 'product_is_on_shopping_cart', 'dlcs', 'reviews', 'reviewsOnRevew'));
    }
}
