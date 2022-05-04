<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bootstrap;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AccountController;
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


Route::get('/', [bootstrap::class,'bootstrap']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','power'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/login', [Controller::class,'login']);

Route::post('/add_to_cart', [ShopController::class,'add_cart']);

Route::get('/shop', [ShoppingCartController::class,'shop']);

Route::get('/shop1', [ShoppingCartController::class,'shop1']);

Route::get('/shop2', [ShoppingCartController::class,'shop2']);

Route::get('/shop3', [ShoppingCartController::class,'shop3']);

Route::get('/shop4', [ShoppingCartController::class,'shop4']);

Route::get('/comment', [Controller::class,'comment']);

Route::get('/comment/save', [Controller::class,'save_comment']);

Route::get('/comment/edit/{id}', [Controller::class,'edit_comment']);

Route::get('/comment/updata/{id}', [Controller::class,'updata_comment']);

Route::get('/comment/delete/{target}', [Controller::class,'del_comment']);

//banner管理頁面 手工建立 遵照 resful api的規定
// Route::get('/banner', [BannerController::class,'bootstrap']); //總表
// Route::get('/banner/create', [BannerController::class,'create']); //新增頁
// Route::post('/banner/store', [BannerController::class,'store']); //儲存
// Route::get('/banner/{id}', [BannerController::class,'show']); //單筆檢視頁
// Route::post('/banner/{id}', [BannerController::class,'edit']); //邊輯頁
// Route::patch('/banner/{id}', [BannerController::class,'update']); //更新
// Route::get('/banner/{id}', [BannerController::class,'des']); //刪除

//一次新增7筆
// php artisan make:controller PhotoController --resource('banner', BannerController::class);

Route::prefix('/banner')->middleware(['auth'])->group(function () { //banner管理相關路由
    Route::get('/', [BannerController::class,'index']); //總表 r

    Route::get('/create', [BannerController::class,'create']); //新增頁 c
    Route::post('/store', [BannerController::class,'store']); //儲存 c

    Route::get('/edit/{id}', [BannerController::class,'edit']); //邊輯頁 u
    Route::post('/update/{id}', [BannerController::class,'update']); //更新 u

    Route::post('/del/{id}', [BannerController::class,'del']); //刪除 d
});

Route::prefix('/shop')->middleware(['auth'])->group(function(){
    Route::get('/', [ShopController::class,'index']); //總表 r

    Route::get('/add', [ShopController::class,'add']); //新增頁 c
    Route::post('/store', [ShopController::class,'store']); //儲存 c

    Route::get('/edit/{id}', [ShopController::class,'edit']); //邊輯頁 u
    Route::post('/update/{id}', [ShopController::class,'update']); //更新 u

    Route::post('/del/{id}', [ShopController::class,'del']); //刪除 d

    Route::post('/del_img/{id}', [ShopController::class,'delete_img']); //刪除次要圖片

    Route::get('/product/{id}', [ShopController::class,'product']);
});

Route::prefix('/account')->middleware(['auth'])->group(function () { //帳號管理相關路由
    Route::get('/', [AccountController::class,'index']); //總表 r

    Route::get('/create', [AccountController::class,'create']); //新增頁 c
    Route::post('/store', [AccountController::class,'store']); //儲存 c

    Route::get('/edit/{id}', [AccountController::class,'edit']); //邊輯頁 u
    Route::post('/update/{id}', [AccountController::class,'update']); //更新 u

    Route::post('/del/{id}', [AccountController::class,'del']); //刪除 d
});
