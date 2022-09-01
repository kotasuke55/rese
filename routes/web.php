<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\EvaluationController;


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

Route::middleware('verified')->group(function () {
Route::post('/detail',[ShopController::class,'detail']);
Route::post('/like',[LikeController::class,'like']);
Route::post('/unlike',[LikeController::class,'unlike']);
Route::post('search',[ShopController::class,'search']);
Route::get('search',[ShopController::class,'search']);
Route::get('mypage',[UserController::class,'mypage']);
Route::post('reserve',[ReserveController::class,'reserve']);
Route::post('reserve/delete',[ReserveController::class,'remove']);
Route::post('edit',[ReserveController::class,'edit']);
Route::post('reserve/update',[ReserveController::class,'update']);
Route::post('evaluation',[EvaluationController::class,'index']);
Route::post('evaluation/create',[EvaluationController::class,'create']);
Route::get('evaluation',[EvaluationController::class,'index']);
Route::post('qrcode',[ReserveController::class,'qrcode']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admin'])->name('dashboard');
    
    require __DIR__.'/admin.php';
});


Route::prefix('representative')->name('representative.')->group(function(){

    Route::get('/dashboard', function () {
        return view('representative.dashboard');
    })->middleware(['auth:representative'])->name('dashboard');
    
    require __DIR__.'/representative.php';
});

