<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user_settings');
    }

    public function update(Request $req, $id)
    {
        $user = User::find($id);
        //Обновление телефона
        if ($req->phone != null) {
            $user->update(['phone' => $req->phone]);
        }

        //Обновление фио
        if ($req->fio != null) {
            $user->update(['fio' => $req->fio]);
        }

        //Обновление почты
        if ($req->email != null) {
            if ($req->email != $user->email) {
                $user->email_verified_at = null;
                $user->update(['email' => $req->email]);
            }
        }

        //Обновление пароля
        if ($req->old_password != null) {
            if (Hash::check($req->old_password, $user->password)) {
                $user->update(['password' => bcrypt($req->password_confirmation)]);
            }
        }
        return back(); //С сообщением, об усешном изменении данных
    }
}
