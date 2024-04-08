<?php

use App\Http\Controllers\HopDongController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\NhanVienController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// });

// Hợp Đồng 
Route::get('/contract',[HopDongController::class,'index'])->name('hop_dong');
Route::post('/upgrade/{id}',[HopDongController::class,'upgrade'])->name('nang_cap_khach_hang');
Route::get('/show/{id}',[HopDongController::class,'show'])->name('xem_hop_dong');
Route::get('/search1',[HopDongController::class,'search'])->name('tim_hop_dong');
Route::post('/store1/{id}',[HopDongController::class,'store'])->name('tao_hop_dong');



// Khách Hàng
Route::get('/index',[KhachHangController::class,'index'])->name('khach_hang');
Route::get('/index1',[KhachHangController::class,'index1'])->name('khach_hang_dv');
Route::get('/search',[KhachHangController::class,'search'])->name('tim_khach_hang');
Route::post('/update/{id}',[KhachHangController::class,'update'])->name('sua_khach_hang');
Route::post('/store',[KhachHangController::class,'store'])->name('luu_khach_hang');
Route::get('/destroy/{id}',[KhachHangController::class,'destroy'])->name('xoa_khach_hang');


// Nhân Viên
Route::get('/user',[NhanVienController::class,'index'])->name('nhan_vien');
Route::post('/store_user',[NhanVienController::class,'store'])->name('them_nhan_vien');
Route::post('/edit_user/{id}',[NhanVienController::class,'edit'])->name('sua_nhan_vien');
Route::get('/destroy_user/{id}',[NhanVienController::class,'destroy'])->name('xoa_nhan_vien');


