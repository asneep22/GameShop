<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function  index_user()
    {
        if (!Auth::check()) {
            return view('user_autorization');
        } else {
            if (Auth::user()->role_id == 3) {
                return redirect()->route('page_user_settings', Auth::id());
            } else if (Auth::user()->role->id < 3) {
                return redirect()->route('page_admin_main');
            }
        }
    }

    public function login_user(Request $req)
    {
        User::whereEmail($req->email)->first()->sendLoginLink();
        return response('ok', 200);
    }

    public function verifyLogin(Request $request, $token)
    {
        $token = \App\Models\LoginToken::whereToken(hash('sha256', $token))->firstOrFail();
        abort_unless($request->hasValidSignature() && $token->isValid(), 401);
        $token->consume();
        Auth::login($token->user);
        return redirect('/');
    }

    //Выход из аккаунта
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('page_welcome');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return back();
    }
}
