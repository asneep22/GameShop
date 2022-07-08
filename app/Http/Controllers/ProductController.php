<?php

namespace App\Http\Controllers;

use App\Models\genre_product;
use App\Models\Product;
use App\Models\product_material;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index($id)
    {
        $materials = product_material::where('product_id', $id)->get();
        $product = Product::with(['genres','oses','videocard','cpu'])->find($id);
        $similar_games = Product::with(['genres','oses','videocard','cpu'])->join('genre_products', 'genre_products.product_id', '=', 'products.id')->select('products.*')
            ->where(function ($query) use ($product) {
                foreach ($product->genres as $key => $genre) {
                
                    $query->orWhere('genre_products.genre_id', '=', $genre->id);

                }
            })->whereNot('products.id', '=', $id)->distinct()->inRandomOrder()->limit(5)->get();
        return view('product', compact('materials', 'product', 'similar_games'));
    }
}
