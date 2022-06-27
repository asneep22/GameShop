<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\mainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::get('/admin', 'index_admin')->name('page_admin_auth');
    Route::get('/auth', 'index_user')->name('page_user_auth');
    Route::post('/registration', 'register_user')->name('register_user');
    Route::post('/login', 'login')->name('login');
    
});


Route::controller(MainController::class)->group(function () {
    Route::get('/', 'index')->name('page_welcome');
});


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
   return redirect()->route('page_user_welcome');   
})->middleware(['auth', 'signed'])->name('verification.verify');
