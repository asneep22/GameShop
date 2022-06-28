<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function  index_user()
    {
        if (!Auth::check()) {
            return view('user_autorization');
        }

        if (Auth::user()->role->id > 2) {
            return redirect()->route('page_welcome');
        } else {
            return redirect()->route('page_admin_main');
        }
    }

    // Авторизация пользователя
    public function login_user(Request $req)
    {
        if (Auth::attempt($req->only(['email', 'password']))) {
            //Обновляем время последнего посещения сайта
            $user = User::where('id', '=', Auth::id())->update(['last_online_at' => now()]);
            if (Auth::user()->role->id > 2) {
                return redirect()->route('page_welcome');
            } else {
                return redirect()->route('page_admin_main');
            }
        }
        return back();
    }

    //Выход из аккаунта
    public function logout()
    {
        Auth::logout();
        return redirect()->route('page_welcome');
    }

    //Регистрация нового пользовтеля
    public function register_user(Request $req)
    {
        //Проверка на наличие почты в базе данных
        if (!User::where('email', '=', $req->email)->first()) {
            $req['password'] = bcrypt($req['password']);
            $req['role_id'] = '3';
            $user = User::create($req->all());
            //Авторизация
            Auth::login($user);
            event(new Registered($user));
            //Возвращение на предыдущю страницу
            return back();
        }
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return back();
    }
}
