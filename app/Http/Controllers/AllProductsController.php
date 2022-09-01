<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Genre;
use App\Models\os;
use App\Models\personal_discount;
use Carbon\Carbon;

class AllProductsController extends Controller
{
    public function index(Request $req)
    {
        $discounts = personal_discount::all();
        $genres = Genre::all();
        $oses = os::all();

        if (!$req->price_max) {
            $req->price_max = 99999;
        }

        if (!$req->price_min) {
            $req->price_min = 0;
        }

        $products = Product::with(['genres', 'oses'])->select('products.*')
            ->join('genre_products', 'genre_products.product_id', '=', 'products.id')
            ->join('os_products', 'os_products.product_id', '=', 'products.id')
            ->where('products.title', 'like', '%' . $req->title . '%')
            ->where('price', '>=', $req->price_min)
            ->where('price', '<=', $req->price_max);

        if ($req->genres) {
            $products = $products->where(function ($query) use ($req) {
                foreach ($req->genres as $genre_id) {
                    $query->orWhere('genre_products.genre_id', '=', $genre_id);
                }
            });
        }

        if ($req->oses) {
            $products = $products->where(function ($query) use ($req) {
                foreach ($req->oses as $os_id) {
                    $query->orWhere('os_products.os_id', '=', $os_id);
                }
            });
        }

        if ($req->redChoose) {
            $products = $products->where('redChoose', '!=', 0);
        }

        if ($req->discount_id) {
            $products = $products->where('discount_id', '!=', null);
        }

        if ($req->new) {
            $products = $products->where(function ($query) {
                $query->orWhere('publishing_date', 'like', '%' . Carbon::now()->format('Y') . '%')
                    ->orWhere('publishing_date', 'like', '%' . (Carbon::now()->format('Y') - 1) . '%')
                    ->orWhere('publishing_date', 'like', '%' . (Carbon::now()->format('Y') - 2) . '%');
            });
        }

        $discount_products = Product::where('discount_id', '!=', null)->limit(3)->get();

        $products = $products->distinct()->paginate(15, ['product.*']);
        return view('all_products', compact('genres', 'products', 'oses', 'discount_products', 'discounts'));
    }
}
