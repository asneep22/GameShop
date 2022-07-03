<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $products = Product::inRandomOrder()->limit(9)->get();
        $products_red = Product::inRandomOrder()->limit(6)->get();
        return view('main', compact('products', 'products_red'));
    }
}
