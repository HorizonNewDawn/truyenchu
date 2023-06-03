<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TheloaiController;
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[IndexController::class,'home']);
Route::get('/danh-muc/{slug}',[IndexController::class,'danhmuc']);
Route::get('/xem-truyen/{slug}',[IndexController::class,'xemtruyen']);
Route::get('/xem-chapter/{slug}',[IndexController::class,'xemchapter']);
Route::get('/the-loai/{slug}',[IndexController::class,'theloai']);
Route::post('/tim-kiem',[IndexController::class,'timkiem']);
Route::post('/timkiem-ajax',[IndexController::class,'timkiem_ajax']);

Route::get('dang-ky',[IndexController::class,'dangky'])->name('dang-ky');
Route::get('dang-nhap',[IndexController::class,'dangnhap'])->name('dang-nhap');
Route::get('dang-xuat',[IndexController::class,'sign_out'])->name('dang-xuat');
Route::get('theo-doi',[IndexController::class,'theodoi'])->name('theo-doi');
Route::get('xoatheodoi/{id}',[IndexController::class,'xoatheodoi'])->name('xoatheodoi');
Route::post('register-publisher',[IndexController::class,'register_publisher'])->name('register-publisher');
Route::post('login-publisher',[IndexController::class,'login_publisher'])->name('login-publisher');
Route::post('themtheodoi',[IndexController::class,'themtheodoi'])->name('themtheodoi');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/danhmuc', DanhmucController::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/chapter', ChapterController::class);
Route::resource('/theloai', TheloaiController::class);

Route::get('/custom_error', function(){
    return Artisan::call('php artisan vendor:publish --tag=laravel-errors');
});
// Route::get('/custom_error',function(){
//     return Artisan::call('php artisan vendor:publish --tag=laravel-errors');
// });
