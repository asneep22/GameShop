<?php

namespace App\Http\Controllers;

use App\Models\cpu;
use App\Models\cpu_product;
use App\Models\discount;
use App\Models\Genre;
use App\Models\genre_product;
use App\Models\key as key_db;
use App\Models\os;
use App\Models\os_product;
use App\Models\Product;
use App\Models\product_material;
use App\Models\videocard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Response;

class AdminProductsController extends Controller
{
    public function index(Request $req)
    {
        if ($req->search) {
            $products = Product::with(['videocard', 'cpu', 'oses', 'genres', 'keys'])->where('title', 'LIKE', "%" . $req->search . "%")->paginate(20);
        } else {
            $products = Product::with(['videocard', 'cpu', 'oses', 'genres', 'keys'])->paginate(20);
        }
        $all_products = Product::all();
        $all_products_not_dlc = Product::whereNull('product_id')->get();
        $genres = Genre::all();
        $oses = os::all();
        $cpus = cpu::all();
        $videocards = videocard::all();
        return view('admin.admin_products', compact('products', 'genres', 'oses', 'cpus', 'videocards', 'all_products', 'all_products_not_dlc'));
    }

    public function create(Request $req)
    {
        //Если скидка не установлена, значит равно 0
        if (!$req->discount) {
            $req['discount'] = 0;
        }

        if (!$req->redChoose) {
            $req['redChoose'] = false;
        }

        //Добавление процессора и видеокарты в справочник если их нет
        $cpu = cpu::firstOrCreate(['pname' => $req->cpu]);
        $videocard = videocard::firstOrCreate(['pname' => $req->videocard]);
        $req['cpu_id'] = $cpu->id;
        $req['videocard_id'] = $videocard->id;

        //Добавление изображние в хранилище
        $path = Storage::disk('public')->put('GamesImages', $req->file);
        $req['file_path'] = $path;
        //Создание записи игры со всеми данными
        $product = Product::create($req->all());
        $req['product_id'] = $product->id;

        //Добавление материалов к игре
        if ($req->materials) {
            foreach ($req->materials as $material) {
                $req['file_path'] = Storage::disk('public')->put('materials', $material);
                product_material::create($req->all());
            }
        }

        //Перебор введенных тегов
        foreach ($req->genre as $key => $genre) {
            //Создание записи названия жанра в таблице genres, если она остутствует
            $genre = Genre::firstOrCreate(['pname' => $genre]);

            //Добавление введенных жанров товару
            $req['genre_id'] = $genre->id;
            genre_product::create($req->all());
        }

        //Добавление операционной системы в справочник, если её/их нет и добавление её/их к систмным требованиям
        foreach ($req->desc_os as $item) {
            $os = os::firstOrCreate(['pname' => $item]);
            $req['os_id'] = $os->id;
            os_product::create($req->all());
        }

        //Создание записей скидок для товара, если они имеются
        for ($i = 1; $i < 6; $i++) {
            if ($req['discount' . $i] != null && $req['daterange' . $i] != null) {
                $dates = explode(' - ', $req['daterange' . $i]);
                $req['date_start'] = $dates[0];
                $req['date_end'] = $dates[1];
                $req['discount'] = $req['discount' . $i];
                discount::create($req->all());
            }
        }

        return back();
    }

    public function add_keys(Request $req, $id)
    {
        $req['product_id'] = $id;
        foreach ($req->keys as $value) {
            $req['key'] = $value;
            key_db::create($req->all());
        }

        return back();
    }

    public function update(Request $req, $id)
    {
        //Добавление процессора и видеокарты в справочник если их нет
        $cpu = cpu::firstOrCreate(['pname' => $req->cpu]);
        $videocard = videocard::firstOrCreate(['pname' => $req->videocard]);
        $req['cpu_id'] = $cpu->id;
        $req['videocard_id'] = $videocard->id;

        //Удаление и обновление изображния в хранилище, если выбрано новое
        if ($req->file) {
            Storage::disk('public')->delete('GamesImages', $req->file);
            $path = Storage::disk('public')->put('GamesImages', $req->file);
            $req['file_path'] = $path;
        }
        if (!$req->redChoose) {
            $req['redChoose'] = 0;
        }

        if (!$req->product_id) {
            $req['product_id'] = null;
        } else {
            $req['product_id'] = $req->product_id;
        }


        //Обновление игры
        $product = Product::find($id)->update($req->all());
        //Добавление материалов к игре
        if ($req->materials) {
            foreach ($req->materials as $material) {
                $req['file_path'] = Storage::disk('public')->put('materials', $material);
                product_material::create($req->all());
            }
        }

        //Обновление тегов у игры
        genre_product::where('product_id', '=', $id)->delete();
        foreach ($req->genre as $key => $genre) {
            $genre = Genre::firstOrCreate(['pname' => $genre]);

            $req['product_id'] = $id;
            $req['genre_id'] = $genre->id;
            genre_product::create($req->all());
        }

        //Обновление операционной системы в системных требованиях
        os_product::where('product_id', '=', $id)->delete();
        foreach ($req->desc_os as $item) {
            $os = os::firstOrCreate(['pname' => $item]);
            $req['os_id'] = $os->id;
            os_product::create($req->all());
        }


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

    public function delete($id)
    {
        if (Product::find($id)) {
            Product::find($id)->delete();
        }
        return back();
    }

    public function delete_many(Request $req)
    {
        if ($req->delete_products_id) {
            foreach ($req->delete_products_id as $product) {
                Product::where("id", '=', $product)->delete();
            }
        }
        return response('ok', 200);
    }

    public function delete_many_keys(Request $req)
    {
        if ($req->delete_keys_id) {
            foreach ($req->delete_keys_id as $id) {
                key_db::where("id", '=', $id)->delete();
            }
        }
        return response('ok', 200);
    }
}
