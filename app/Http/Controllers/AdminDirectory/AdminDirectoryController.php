<?php

namespace App\Http\Controllers\AdminDirectory;

use App\Models\cpu;
use App\Models\Genre;
use App\Models\genre_product;
use App\Models\os;
use App\Models\os_product;
use App\Models\personal_discount;
use App\Models\Product;
use App\Models\videocard;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class AdminDirectoryController extends AdminDirictoryBaseController
{
    public function index(Request $req)
    {
        if ($req->search != null) {
            $discounts = personal_discount::where('sum_buy', 'LIKE', '%' . $req->search . '%')->orWhere('disocunt_procent', '%' . 'LIKE' . '%', $req->search)->get();
            $genres = Genre::where('pname', 'LIKE', '%' . $req->search . '%')->get();
            $videocards = videocard::where('pname', 'LIKE', '%' . $req->search . '%')->get();
            $oses = os::where('pname', 'LIKE', '%' . $req->search . '%')->get();
            $cpus = cpu::where('pname', 'LIKE', '%' . $req->search . '%')->get();
        } else {
            $discounts = personal_discount::all();
            $genres = Genre::all();
            $videocards = videocard::all();
            $oses = os::all();
            $cpus = cpu::all();
        }
        return view('admin.admin_direcories', compact('genres', 'videocards', 'oses', 'cpus', 'discounts'));
    }

    public function addGenres(Request $req)
    {
        $this->service->firstOrCreateManyDirectoriesFromRequest($req, 'genres', Genre::class);
        return back();
    }

    public function addOses(Request $req)
    {
        $this->service->firstOrCreateManyDirectoriesFromRequest($req, 'oses', os::class);
        return back();
    }

    public function addCpus(Request $req)
    {
        $this->service->firstOrCreateManyDirectoriesFromRequest($req, 'cpus', cpu::class);
        return back();
    }

    public function addVideocards(Request $req)
    {
        $this->service->firstOrCreateManyDirectoriesFromRequest($req, 'videocards', videocard::class);
        return back();
    }

    public function addDiscount(Request $req)
    {
        $this->service->createDiscount($req);
        return back();
    }

    public function updateGenre(Request $req, $id)
    {
        $this->service->updateDirectory($req, $id, Genre::class);
        return back();
    }

    public function updateOs(Request $req, $id)
    {
        $this->service->updateDirectory($req, $id, os::class);
        return back();
    }

    public function updateCpu(Request $req, $id)
    {
        $this->service->updateDirectory($req, $id, cpu::class);
        return back();
    }

    public function updateVideocards(Request $req, $id)
    {
        $this->service->updateDirectory($req, $id, videocard::class);
        return back();
    }

    public function updateDiscount(Request $req, $id)
    {
        $this->service->updateDirectory($req, $id, personal_discount::class);
        return back();
    }

    public function deleteGenre($id)
    {
        $this->service->deleteDirectory(Genre::class, $id);
        return back();
    }

    public function deleteOs($id)
    {
        $this->service->deleteOs($id);
        return back();
    }

    public function deleteCpu($id)
    {
        $this->service->deleteCpu($id);
        return back();
    }

    public function deleteVideocard($id)
    {
        $this->service->deleteVideocard($id);
        return back();
    }

    public function deleteDiscount($id)
    {
        $this->service->deleteDiscount($id);
        return back();
    }

    public function deleteDirectoriesMany(Request $req)
    {
        $this->service->deleteDirectoriesMany($req);
        response('ok', 200);
    }
}
