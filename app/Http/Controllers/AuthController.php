<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index_admin(){
        return view('autorization_admin');
    }

    public function  index_user(){
        return view('autorization_user');
    }

    public function auth(){
        
    }
}
