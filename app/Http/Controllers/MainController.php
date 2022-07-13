<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $products = Product::inRandomOrder()->limit(9)->get();
        $genres = Genre::inRandomOrder()->limit(5)->get();

        if (Product::where('redChoose', '!=', '0')->count() < 6){
            $changed_products = Product::inRandomOrder()->limit(6)->get();

            foreach($changed_products as $product){
                $product->update(['redChoose' => '1']);
            }
        }

        $products_red = Product::where('redChoose', '!=', '0')->inRandomOrder()->limit(6)->get();
        return view('main', compact('products', 'products_red', 'genres'));
    }
}
