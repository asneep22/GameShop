<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index(Request $req){

        if($req != null){
            $users = User::where('role_id','<>','1')
            ->Where('role_id','<>','2')
            ->Where('email', 'LIKE', '%'.$req->email.'%')->paginate(50);
        }
        else{
            $users = User::where('role_id','<>','1')
            ->Where('role_id','<>','2')->paginate(50);
        }

        $paginator_props = $users->toArray();

        return view('admin.admin_users', compact('users', 'paginator_props'));
    }
}
