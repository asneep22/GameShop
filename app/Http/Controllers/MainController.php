<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Product;
use App\Models\product_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){

        $product_users = collect();
        if(Auth::check()){
            $product_users = product_user::where('user_id', Auth::id())->get();
        }
        $products = Product::inRandomOrder()->limit(9)->get();
        $genres = Genre::inRandomOrder()->limit(12)->get();
        $games_for_video = Product::with('materials')->join('product_materials', 'product_materials.product_id', 'products.id')->select('products.*')->where('product_materials.file_path','LIKE', '%'.'webm'."%")->inRandomOrder()->distinct()->limit(6)->get();
        if (Product::where('redChoose', '!=', '0')->count() < 6){
            $changed_products = Product::inRandomOrder()->limit(6)->get();
            foreach($changed_products as $product){
                $product->update(['redChoose' => '1']);
            }
        }

        $products_red = Product::where('redChoose', '!=', '0')->inRandomOrder()->limit(6)->get();
        return view('main', compact('products', 'products_red', 'genres', 'games_for_video', 'product_users'));
    }
}
