<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAdminsService extends Controller
{
    public function create(Request $data){
        $req['password'] = bcrypt($data['password']);
        $admin = User::create($data->all());
    }
}
