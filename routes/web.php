<?php

use App\Http\Controllers\AdminAdminsController;
use App\Http\Controllers\AdminDirectoryController;
use App\Http\Controllers\AdminMainController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AllProductsController;
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
    Route::get('/auth', 'index_user')->name('page_user_auth');
    Route::post('/registration', 'register_user')->name('register_user');
    Route::post('/login', 'login_user')->name('login_user');
    Route::post('/login_admin', 'login_admin')->name('login_admin');
    Route::get('/logout', 'logout')->name('logout');
});

//admin
Route::middleware(['authAdmin'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/delete/{id}', 'delete')->name('delete_user')->middleware('chiefAdmin');
    });

    Route::prefix('admin')->group(function () {
        Route::controller(AdminMainController::class)->group(function () {
            Route::get('/main', 'index')->name('page_admin_main');
        });

        Route::controller(AdminProductsController::class)->group(function () {
            Route::get('/products', 'index')->name('page_admin_products');
            Route::post('/products/add', 'create')->name("create_product");
            Route::post('/products/update/{id}', 'update')->name("update_product");
            Route::delete('/products/delete/{id}', 'delete')->name("delete_product");
            Route::post('/products/delete_many', 'delete_many')->name("delete_many_products");
        });


        Route::controller(AdminUsersController::class)->group(function () {
            Route::get('/users', 'index')->name('page_admin_users');
        });

        Route::controller(AdminAdminsController::class)->group(function () {
            Route::get('/admins', 'index')->name('page_admin_admins');
            Route::post('/admins/create', 'create_admin')->name('create_admin');
        });

        Route::middleware(['checkId'])->group(function () {

            Route::controller(AdminSettingController::class)->group(function () {
                Route::get('/settings/{id}', 'index')->name('page_admin_settings');
                Route::post('/settings/{id}/update', 'update')->name('AdminSettingUpd');
            });
        });

        Route::controller(AdminDirectoryController::class)->group(function () {
            Route::get('/directories', 'index')->name('page_admin_directories');
            Route::post('/directories/add_genres', 'addGenres')->name('addGenres');
            Route::post('/directories/add_oses', 'addOses')->name('addOses');
            Route::post('/directories/add_cpus', 'addCpus')->name('addCpus');
            Route::post('/directories/add_videocards', 'addVideocards')->name('addVideocards');
            Route::post('/directories/update_genre/{id}', 'updateGenre')->name('updateGenre');
            Route::post('/directories/update_os/{id}', 'updateOs')->name('updateOs');
            Route::post('/directories/update_cpu/{id}', 'updateCpu')->name('updateCpu');
            Route::post('/directories/update_videocards/{id}', 'updateVideocard')->name('updateVideocard');
            Route::get('/directories/delete_genre/{id}', 'deleteGenre')->name('deleteGenre');
            Route::get('/directories/delete_os/{id}', 'deleteOs')->name('deleteOs');
            Route::get('/directories/delete_cpu/{id}', 'deleteCpu')->name('deleteCpu');
            Route::get('/directories/delete_videocards/{id}', 'deleteVideocard')->name('deleteVideocard');
            Route::post('/directories/delete_irectories_many', 'deleteDirectoriesMany')->name('deleteDirectoriesMany');
        });
    });
});


Route::controller(AllProductsController::class)->group(function () {
    Route::get('/all_products', 'index')->name('page_all_products');
});
Route::controller(MainController::class)->group(function () {
    Route::get('/', 'index')->name('page_welcome');
});


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('page_user_welcome');
})->middleware(['auth', 'signed'])->name('verification.verify');
