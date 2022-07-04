<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Genre;

class AllProductsController extends Controller
{
    public function index(Request $req){
        $genres = Genre::all();

        $products = Product::paginate(15);
        return view('all_products', compact('genres', 'products'));
    }
}
