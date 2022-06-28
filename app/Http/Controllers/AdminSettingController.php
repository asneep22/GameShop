<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index($id){
        return view('admin.admin_settings');
    }

    public function save(Request $req){
        
    }
}
