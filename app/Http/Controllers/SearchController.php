<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $req){
        $text = $req->title;
        $products = Product::where('title', 'like', '%'.$text.'%')->get();
        return response()->json($products, 200);
    }
}
