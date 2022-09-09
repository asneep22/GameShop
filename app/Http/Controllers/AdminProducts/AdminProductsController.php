<?php

namespace App\Http\Controllers\AdminProducts;


use App\Models\cpu;
use App\Models\Genre;
use App\Models\os;
use App\Models\Product;
use App\Models\product_material;
use App\Models\videocard;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class AdminProductsController extends AdminProductsBaseController
{
    public function index(Request $req)
    {
        if ($req->search) {
            $products = Product::with(['videocard', 'cpu', 'oses', 'genres', 'keys'])->where('title', 'LIKE', "%" . $req->search . "%")->paginate(20);
        } else {
            $products = Product::with(['videocard', 'cpu', 'oses', 'genres', 'keys'])->paginate(20);
        }
        $all_products = Product::all();
        $dls_products = Product::whereNotNull('product_id')->get();
        $genres = Genre::all();
        $oses = os::all();
        $cpus = cpu::all();
        $videocards = videocard::all();
        return view('admin.admin_products', compact('products', 'genres', 'oses', 'cpus', 'videocards', 'all_products', 'dls_products'));
    }

    public function create(Request $req)
    {
        $product = $this->service->createProduct($req);
        $this->service->LoadSettingToProduct($req, $product);
        return back();
    }

    public function update(Request $req, $id)
    {
        $product = $this->service->updateProduct($req, $id);
        $this->service->LoadSettingToProduct($req, $product);
        return back();
    }

    public function add_keys(Request $req, $id)
    {
        $this->service->addKeysToProduct($req, $id);
        return back();
    }

    public function delete_material($id)
    {
        if (product_material::find($id)) {
            $material = product_material::find($id);
            Storage::disk('public')->delete($material->file_path);
            $material->delete();
        }
        return back();
    }

    public function delete_many(Request $req)
    {
        if ($req->delete_products_id) {
            foreach ($req->delete_products_id as $product_id) {
                $this->service->DeleteProduct($product_id);
            }
        }
        return response('ok', 200);
    }

    public function delete($id)
    {
        $this->service->DeleteProduct($id);
        return back();
    }

    public function delete_many_keys(Request $req)
    {
        if ($req->delete_keys_id) {
            foreach ($req->delete_keys_id as $id) {
                $this->service->DeleteKey($id);
            }
        }
        return response('ok', 200);
    }
}
