<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function indexVk(){
        // return Socialite::driver('vkontakte')->redirect();
    }

    public function callbackVk(){

    }
}
