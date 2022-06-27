<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index_admin()
    {
        return view('autorization_admin');
    }

    public function  index_user()
    {
        if (!Auth::check()) {
            return view('autorization_user');
        }
        return redirect()->route('page_welcome');
    }

    public function login(Request $req)
    {
        if (Auth::attempt($req->only(['login', 'password']))) {
            return redirect()->route('page_welcome');
        }
        return back();
    }

    public function register_user(Request $req)
    {
        if (!User::where('email', '=', $req->email)->first()) {
            $req['password'] = bcrypt($req['password']);
            $req['role'] = 'user';
            $user = User::create($req->all());
            Auth::login($user);
            event(new Registered($user));
            return back();
        }
    }
}
