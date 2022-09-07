<?php

namespace App\Http\Controllers\AdminAdmins;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAdminsController extends AdminAdminsBaseController
{
    public function index(){
        $admins = User::where('role_id', '<', '3')
        ->get();
        $roles = Role::where('id', '<', '3')->get();
        return view('admin.admin_admins', compact('admins', 'roles'));
    }

    public function create_admin(Request $req){
        $this->service->create($req);
        return back();
    }
}
