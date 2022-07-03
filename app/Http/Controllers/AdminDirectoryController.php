<?php

namespace App\Http\Controllers;

use App\Models\cpu;
use App\Models\Genre;
use App\Models\genre_product;
use App\Models\os;
use App\Models\os_product;
use App\Models\Product;
use App\Models\videocard;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AdminDirectoryController extends Controller
{
    public function index(Request $req)
    {
        if ($req->search != null) {
            $genres = Genre::where('pname', '=', $req->search)->get();
            $videocards = videocard::where('pname', '=', $req->search)->get();
            $oses = os::where('pname', '=', $req->search)->get();
            $cpus = cpu::where('pname', '=', $req->search)->get();
        } else {
            $genres = Genre::all();
            $videocards = videocard::all();
            $oses = os::all();
            $cpus = cpu::all();
        }
        return view('admin.admin_direcories', compact('genres', 'videocards', 'oses', 'cpus'));
    }

    //Добавление
    public function addGenres(Request $req)
    {
        foreach ($req->genres as $genre) {
            $req['pname'] = $genre;
            Genre::firstOrcreate($req->only('pname'));
        }
        return back();
    }


    public function addOses(Request $req)
    {
        foreach ($req->oses as $os) {
            $req['pname'] = $os;
            os::firstOrcreate($req->only('pname'));
        }
        return back();
    }

    public function addCpus(Request $req)
    {
        foreach ($req->cpus as $cpu) {
            $req['pname'] = $cpu;
            cpu::firstOrcreate($req->only('pname'));
        }
        return back();
    }

    public function addVideocards(Request $req)
    {
        foreach ($req->cpus as $cpu) {
            $req['pname'] = $cpu;
            videocard::firstOrcreate($req->only('pname'));
        }
        return back();
    }

    //Обновление
    public function updateGenre(Request $req, $id)
    {
        Genre::find($id)->update($req->all());
        return back();
    }

    public function updateOs(Request $req, $id)
    {
        os::find($id)->update($req->all());
        return back();
    }

    public function updateCpu(Request $req, $id)
    {
        cpu::find($id)->update($req->all());
        return back();
    }

    public function updateVideocards(Request $req, $id)
    {
        videocard::find($id)->update($req->all());
        return back();
    }

    //Удаление
    public function deleteGenre($id)
    {
        $genre = Genre::find($id);
        if ($genre) {
            if (!genre_product::where('genre_id', '=', $genre->id)->first()) {
                $genre->delete();
            } else {
                //Вывод сообщения, что запись используется у товара
            }
        }
        return back();
    }

    public function deleteOs($id)
    {
        $os = os::find($id);
        if ($os) {
            if (!os_product::where('os_id', '=', $os->id)->first()) {
                $os->delete();
            } else {
                //Вывод сообщения, что запись используется у товара
            }
        }

        return back();
    }

    public function deleteCpu($id)
    {
        $cpu = cpu::find($id);
        if ($cpu) {
            if (!Product::where('cpu_id', '=', $cpu->id)->first()) {
                $cpu->delete();
            } else {
                //Вывод сообщения, что запись используется у товара
            }
        }
        return back();
    }

    public function deleteVideocard($id)
    {
        $videocard = cpu::find($id);
        if ($videocard) {
            if (!Product::where('videocard_id', '=', $videocard->id)->first()) {
                $videocard->delete();
            } else {
                //Вывод сообщения, что запись используется у товара
            }
        }
        return back();
    }

    public function deleteDirectoriesMany(Request $req)
    {
        $non_deleted = [];
        //Удаление жанров, если они не ипользуются у записей товаров
        if ($req->delete_genres_id) {
            foreach ($req->delete_genres_id as $genre_id) {
                if (!genre_product::where('genre_id', '=', $genre_id)->first()) {
                    Genre::find($genre_id)->delete();
                } else {
                    array_push($non_deleted, Genre::find($genre_id)->pname);
                }
            }
        }

        //Удаление операционных систем, если они не ипользуются у записей товаров
        if ($req->delete_oses_id) {
            foreach ($req->delete_oses_id as $os_id) {
                if (!os_product::where('os_id', '=', $os_id)->first()) {
                    os::find($os_id)->delete();
                } else {
                    array_push($non_deleted, os::find($os_id)->pname);
                }
            }
        }

        //Удаление процессоров, если они не ипользуются у записей товаров
        if ($req->delete_cpus_id) {
            foreach ($req->delete_cpus_id as $cpu_id) {
                if (!Product::where('cpu_id', '=', $cpu_id)->first()) {
                    cpu::find($cpu_id)->delete();
                } else {
                    array_push($non_deleted, cpu::find($cpu_id)->pname);
                }
            }
        }

        //Удаление видеокард, если они не ипользуются у записей товаров
        if ($req->delete_videocards_id) {
            foreach ($req->delete_videocards_id as $videocard_id) {
                if (!Product::where('cpu_id', '=', $videocard_id)->first()) {
                    cpu::find($videocard_id)->delete();
                } else {
                    array_push($non_deleted, cpu::find($videocard_id)->pname);
                }
            }
        }

        response('ok', 200);
    }
}
