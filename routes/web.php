<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReserveController;

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

Route::get('/',[ShopController::class,'index']);
Route::post('/detail',[ShopController::class,'detail']);
Route::post('/like',[LikeController::class,'like']);
Route::post('/unlike',[LikeController::class,'unlike']);
Route::post('search',[ShopController::class,'search']);
Route::get('search',[ShopController::class,'search']);
Route::get('mypage',[UserController::class,'mypage']);
Route::post('reserve',[ReserveController::class,'reserve']);
Route::post('reserve/delete',[ReserveController::class,'remove']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
