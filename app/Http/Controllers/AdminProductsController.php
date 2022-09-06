<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\cpu;
use App\Models\cpu_product;
use App\Models\discount;
use App\Models\Genre;
use App\Models\genre_product;
use App\Models\key as key_db;
use App\Models\os;
use App\Models\os_product;
use App\Models\Product;
use App\Models\product_discounts;
use App\Models\product_material;
use App\Models\videocard;
use FFMpeg\Filters\Video\ResizeFilter;
use FFMpeg\Filters\Video\VideoFilters;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use FFMpeg\Format\Video\WebM;
use FFMpeg\Format\Video\X264;

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
        if (!$req->redChoose) {
            $req['redChoose'] = false;
        }
        $cpu = cpu::firstOrCreate(['pname' => $req->cpu]);
        $req['cpu_id'] = $cpu->id;

        $videocard = videocard::firstOrCreate(['pname' => $req->videocard]);
        $req['videocard_id'] = $videocard->id;

        $req['file_path'] = Storage::disk('public')->put('GamesImages', $req->file);
        $product = Product::create($req->all());

        $this->CreateProductMaterials($req->materials, $product->id); //videos and images

        foreach ($req->genre as $genreName) {
            $genre = Genre::firstOrCreate(['pname' => $genreName]);
            $this->AddGenreToProduct($genre->id, $product->id);
        }

        foreach ($req->desc_os as $osName) {
            $os = os::firstOrCreate(['pname' => $osName]);
            $this->AddOsToProduct($os->id, $product->id);
        }

        $this->AddDiscounts($req, $product->id);
        $this->UpdateDiscount($product);

        return back();
    }

    #region MethodsOfCreateFunction
    private function CreateProductMaterials($materials, $productId)
    {
        if ($materials) {
            foreach ($materials as $material) {
                $path = Storage::disk('public')->putFileAs('materials', $material, $material->getClientOriginalName());
                if (pathinfo($path, PATHINFO_EXTENSION) == 'webm') { //Images automaticly compress with spatie/laravel-image-optimizer
                    // $this->CompressVideo($material, $path); Очень долго выполняется
                }
                $this->AddMaterialToProduct($path, $productId);
            }
        }
    }

    private function CompressVideo($video, $savePath)
    {
        $bitrateOfResolution480p = (new WebM())->setKiloBitrate(500);
        FFMpeg::fromDisk('public')
            ->open($video)
            ->export()
            ->inFormat($bitrateOfResolution480p)
            ->resize(854, 480)
            ->toDisk('public')
            ->save($savePath);
    }

    private function AddMaterialToProduct($materialFilePath, $productId)
    {
        product_material::create([
            'file_path' => $materialFilePath,
            'product_id' => $productId,
        ]);
    }

    private function AddGenreToProduct($genreId, $productId)
    {
        genre_product::create([
            'genre_id' => $genreId,
            'product_id' => $productId,
        ]);
    }

    private function AddOsToProduct($osId, $productId)
    {
        os_product::create([
            'os_id' => $osId,
            'product_id' => $productId,
        ]);
    }
    #endregion

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

        //Удаление предыдущих скидок
        product_discounts::where('product_id', $id)->delete();
        $this->AddDiscounts($req, $id);
        $this->UpdateDiscount(Product::find($id));
        //Обновление игры
        Product::find($id)->update($req->all());
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

    private function AddDiscounts(Request $req, $product_id)
    {
        for ($i = 1; $i < 6; $i++) {
            if ($req['discount' . $i] != null && $req['daterange' . $i] != null) {
                $dates = explode(' - ', $req['daterange' . $i]);
                $req['date_start'] = $dates[0];
                $req['date_end'] = $dates[1];
                $req['discount'] = $req['discount' . $i];
                $discount = discount::create($req->all());
                product_discounts::create([
                    'product_id' => $product_id,
                    'discount_id' => $discount->id,
                ]);
            }
        }
    }

    private function UpdateDiscount($product)
    {
        //Вычисляем нынешнюю дату
        $date_now = Carbon::now();
        $date_now = strtotime($date_now->format('d.m.Y'));
        $discount = null;
        //Перебираем отложенные скидки у товара
        if ($product->discounts->count() > 0) {
            for ($i = 0; $i < $product->discounts->count(); $i++) {
                //Вычисляем даты начала и конца скидки
                $date_in = strtotime($product->discounts->get($i)->date_start);
                $date_out = strtotime($product->discounts->get($i)->date_end);
                //Если даты записи скидки находятся в диапазоне date_in и date_out тогда помещаем id скидки в discount_id

                //Удаляем запись о скидке, если она просрочена
                if ($date_now - $date_out > 0) {
                    discount::where('id', $product->discounts->get($i)->id)->delete();
                    continue;
                }

                //Запоминаем скидку, если даты скидки находятся в диапазоне
                if ($date_now > $date_in && $date_now < $date_out) {
                    $discount = $product->discounts->get($i);
                    return $product->update(['discount_id' => $discount->id]);
                }
                //Присваиваем товару скидку, которая находится в диапазоне
            }
        }
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
                $this->delete($product_id);
            }
        }
        return response('ok', 200);
    }

    public function delete($id)
    {
        if (Product::find($id)) {
            $this->delete_materails($id);
            Product::find($id)->delete();
        }
        return back();
    }

    private function delete_materails($product_id)
    {
        $product = Product::where("id", '=', $product_id)->first();
        $product_material = product_material::where('product_id', $product_id)->get();
        Storage::disk('public')->delete($product->file_path);
        foreach ($product_material as $material) {
            Storage::disk('public')->delete($material->file_path);
        }
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
