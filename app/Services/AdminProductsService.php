<?php

namespace App\Services;

use App\Models\cpu;
use App\Models\discount;
use App\Models\Genre;
use App\Models\genre_product;
use App\Models\key;
use App\Models\os;
use App\Models\os_product;
use App\Models\Product;
use App\Models\product_discounts;
use App\Models\product_material;
use App\Models\videocard;
use Carbon\Carbon;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use FFMpeg\Format\Video\WebM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\CssSelector\Node\FunctionNode;

class AdminProductsService extends Service
{
    public function createProduct(Request $req)
    {
        if (!$req->redChoose) $req['redChoose'] = false;
        $req['cpu_id'] = (cpu::firstOrCreate(['pname' => $req->cpu]))->id;
        $req['videocard_id'] = (videocard::firstOrCreate(['pname' => $req->videocard]))->id;
        $req['file_path'] = Storage::disk('public')->put('GamesImages', $req->file);
        $req['price'] = $req->price - ($req->price / 100) * ($req->discount_id == null ? 0 : product_discounts::find($req->discount_id)->discount);
        $product = Product::create($req->all());
        $this->AddDiscountsToProduct($req, $product->id);
        return $product;
    }

    public function updateProduct(Request $req, $id)
    {
        $product = Product::find($id);
        if (!$req->redChoose) $req['redChoose'] = false;
        $req['cpu_id'] = (cpu::firstOrCreate(['pname' => $req->cpu]))->id;
        $req['videocard_id'] = (videocard::firstOrCreate(['pname' => $req->videocard]))->id;
        $req['price'] = $req->price;
        if(!$req->product_id){ //DLC
            $req['product_id'] = null;
        }
        if ($req->file) {
            Storage::disk('public')->delete('GamesImages', $req->file);
            $path = Storage::disk('public')->put('GamesImages', $req->file);
            $req['file_path'] = $path;
        }
        genre_product::where('product_id', '=', $id)->delete();
        product_discounts::where('product_id', $id)->delete();
        os_product::where('product_id', '=', $id)->delete();
        $product->update($req->all());
        return $product;
    }

    #region ProductSettings
    public function LoadSettingToProduct(Request $req, $product)
    {
        $this->AddMaterialsToProduct($req->materials, $product->id); //videos and images
        $this->AddGenresToProduct($req, $product->id);
        $this->AddOsesToProduct($req, $product->id);
        $this->AddDiscountsToProduct($req, $product->id);
        $this->UpdateDiscountOnProduct($product);
    }

    private function AddMaterialsToProduct($materials, $productId)
    {
        if ($materials) {
            foreach ($materials as $material) {
                $path = Storage::disk('public')->putFileAs('materials', $material, $material->getClientOriginalName());
                if (pathinfo($path, PATHINFO_EXTENSION) == 'webm') { //Images automaticly compress with spatie/laravel-image-optimizer
                    $this->CompressVideo($material, $path); //Very long success time
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

    private function AddGenresToProduct(Request $req, $product_id)
    {
        foreach ($req->genre as $genreName) {
            $genre = Genre::firstOrCreate(['pname' => $genreName]);
            $this->AddGenreToProduct($genre->id, $product_id);
        }
    }

    private function AddGenreToProduct($genreId, $productId)
    {
        genre_product::create([
            'genre_id' => $genreId,
            'product_id' => $productId,
        ]);
    }


    private function AddOsesToProduct(Request $req, $product_id)
    {
        foreach ($req->desc_os as $osName) {
            $genre = os::firstOrCreate(['pname' => $osName]);
            $this->AddOsToProduct($genre->id, $product_id);
        }
    }

    private function AddOsToProduct($osId, $productId)
    {
        os_product::create([
            'os_id' => $osId,
            'product_id' => $productId,
        ]);
    }
    #endregion

    #region Discount
    private function AddDiscountsToProduct(Request $req, $product_id)
    {
        for ($i = 1; $i < 6; $i++) {
            if ($req['discount' . $i] != null && $req['daterange' . $i] != null) {
                $dates = explode(' - ', $req['daterange' . $i]);
                $req['date_start'] = $dates[0];
                $req['date_end'] = $dates[1];
                $req['discount'] = $req['discount' . $i];
                $discount = discount::firstOrCreate($req->only(['discount', 'date_start', 'date_end']));
                product_discounts::firstOrCreate([
                    'product_id' => $product_id,
                    'discount_id' => $discount->id,
                ]);
            }
        }
    }

    private function UpdateDiscountOnProduct($product)
    {
        $date_now = Carbon::now();
        $date_now = strtotime($date_now->format('d.m.Y'));
        $discount = null;
        if ($product->discounts->count() > 0) {
            for ($i = 0; $i < $product->discounts->count(); $i++) {
                $date_in = strtotime($product->discounts->get($i)->date_start);
                $date_out = strtotime($product->discounts->get($i)->date_end);

                if ($date_now - $date_out > 0) {
                    discount::where('id', $product->discounts->get($i)->id)->delete();
                    continue;
                }
                if ($date_now > $date_in && $date_now < $date_out) {
                    $discount = $product->discounts->get($i);
                    $product->update(['discount_id' => $discount->id]);
                    $product->update(['discount_price' => $product->price - ($product->price / 100) * $discount->discount]);
                }
            }
        }
    }
    #endregion

    public function addKeysToProduct(Request $req, $product_id)
    {
        $req['product_id'] = $product_id;
        foreach ($req->keys as $value) {
            $req['key'] = $value;
            key::create($req->all());
        }
    }

    public function DeleteKey($id){
        key::where("id", '=', $id)->delete();
    }

    public function DeleteProduct($id)
    {
        if (Product::find($id)) {
            $this->delete_materails($id);
            Product::find($id)->delete();
        }
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
}
