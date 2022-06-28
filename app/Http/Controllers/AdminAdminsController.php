<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAdminsController extends Controller
{
    public function index(){
        $admins = User::where('role_id', '<', '3')
        ->get();
        $roles = Role::where('id', '<', '3')->get();
        return view('admin.admin_admins', compact('admins', 'roles'));
    }

    public function create_admin(Request $req){
        $req['password'] = bcrypt($req['password']);
        $admin = User::create($req->all());
        return back();
    }
}
