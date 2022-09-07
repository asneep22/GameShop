<?php

namespace App\Services;

use App\Http\Controllers\Controller;

use App\Models\cpu;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\genre_product;
use App\Models\os;
use App\Models\os_product;
use App\Models\personal_discount;
use App\Models\Product;
use App\Models\videocard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminDirictoriesService extends Service
{

    public function firstOrCreateManyDirectoriesFromRequest(Request $req, string $req_field, string $model)
    {
        foreach ($req->$req_field as $item) {
            $req['pname'] = $item;
            $model::firstOrcreate($req->only('pname'));
        }
    }

    public function createDiscount(Request $req)
    {
        personal_discount::firstOrcreate($req->except('_token'));
    }

    public function updateDirectory(Request $req, $id, string $model)
    {
        $item = $model::find($id);
        if ($req->file) {
            if ($item->file_path != null) {
                Storage::disk('public')->delete('GenreIcons', $item->file_path);
            }
            $req['file_path'] = Storage::disk('public')->put('GenreIcons', $req->file);
        }
        $item->update($req->all());
    }

    public function deleteDirectory(string $model, $id)
    {
        $item = $model::find($id);
        if ($item) {
            $item->delete();
        }
    }

    public function deleteDirectoriesMany(Request $req)
    {
        if ($req->delete_genres_id) {
            foreach ($req->delete_genres_id as $genre_id) {
                Genre::find($genre_id)->delete();
            }
        }

        if ($req->delete_oses_id) {
            foreach ($req->delete_oses_id as $os_id) {
                os::find($os_id)->delete();
            }
        }

        if ($req->delete_cpus_id) {
            foreach ($req->delete_cpus_id as $cpu_id) {
                cpu::find($cpu_id)->delete();
            }
        }

        if ($req->delete_videocards_id) {
            foreach ($req->delete_videocards_id as $videocard_id) {
                cpu::find($videocard_id)->delete();
            }
        }
    }
    #endregion
}
