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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuccessPageController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Artisan;
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
    Route::get('/verify_email/{id}', 'verify_email')->name('verification.send')->middleware(['checkId', 'auth', 'throttle:6,1']);
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
            Route::post('/products/add_keys/{id}', 'add_keys')->name("add_keys");
            Route::post('/products/update/{id}', 'update')->name("update_product");
            Route::delete('/products/delete/{id}', 'delete')->name("delete_product");
            Route::get('/products/delete_material/{id}', 'delete_material')->name("delete_material");
            Route::post('/products/delete_many', 'delete_many')->name("delete_many_products");
            Route::post('/products/delete_many_keys', 'delete_many_keys')->name("delete_many_keys");
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
                Route::get('/settings_admin/{id}', 'index')->name('page_admin_settings');
                Route::post('/settings_admin/{id}/update', 'update')->name('AdminSettingUpd');
            });
        });

        Route::controller(AdminDirectoryController::class)->group(function () {
            Route::get('/directories', 'index')->name('page_admin_directories');
            Route::post('/directories/add_genres', 'addGenres')->name('addGenres');
            Route::post('/directories/add_oses', 'addOses')->name('addOses');
            Route::post('/directories/add_cpus', 'addCpus')->name('addCpus');
            Route::post('/directories/add_videocards', 'addVideocards')->name('addVideocards');
            Route::post('/directories/add_disount', 'addDiscount')->name('addDiscount')->middleware('chiefAdmin');;
            Route::post('/directories/update_genre/{id}', 'updateGenre')->name('updateGenre');
            Route::post('/directories/update_os/{id}', 'updateOs')->name('updateOs');
            Route::post('/directories/update_cpu/{id}', 'updateCpu')->name('updateCpu');
            Route::post('/directories/update_videocards/{id}', 'updateVideocard')->name('updateVideocard');
            Route::post('/directories/update_discount/{id}', 'updateDiscount')->name('updateDiscount')->middleware('chiefAdmin');;
            Route::get('/directories/delete_genre/{id}', 'deleteGenre')->name('deleteGenre');
            Route::get('/directories/delete_os/{id}', 'deleteOs')->name('deleteOs');
            Route::get('/directories/delete_cpu/{id}', 'deleteCpu')->name('deleteCpu');
            Route::get('/directories/delete_videocards/{id}', 'deleteVideocard')->name('deleteVideocard');
            Route::get('/directories/delete_discount/{id}', 'deleteDiscount')->name('deleteDiscount')->middleware('chiefAdmin');;
            Route::post('/directories/delete_irectories_many', 'deleteDirectoriesMany')->name('deleteDirectoriesMany');
        });
    });

    //Для создания ссылки на файловое хранилище
    Route::get('/linkstorage', function(){
        Artisan::call('storage:link');
    });
});

Route::middleware(['checkId'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/settings_user/{id}', 'index')->name('page_user_settings');
        Route::post('/settings_user/{id}/update', 'update')->name('UserSettingUpd');
    });
});

Route::controller(AllProductsController::class)->group(function () {
    Route::get('/all_products/{tag?}', 'index')->name('page_all_products');
});

Route::prefix('robokassa')->controller(SuccessPageController::class)->group(function (){
    Route::post('/pay_result', 'indexResult')->name('paymentResult');
    Route::post('/payment_end', 'indexSuccess')->name('paymentEnd');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{id}', 'index')->name('page_product');
});

Route::controller(ShoppingCartController::class)->group(function () {
    Route::get('/shopping_cart', 'index')->name('page_shopping_cart');
    Route::get('/add_product_to_cart/{id}', 'add_product_to_cart')->name('add_product_to_cart');
    Route::post('/buy', 'buy')->name('buy');
    Route::get('/delete_product_from_card/{id}', 'delete_product_from_card')->name('delete_product_from_card');
});

Route::controller(MainController::class)->group(function () {
    Route::get('/', 'index')->name('page_welcome');
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('page_welcome');
})->middleware(['auth', 'signed'])->name('verification.verify');
