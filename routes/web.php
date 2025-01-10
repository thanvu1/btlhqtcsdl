<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminSetupController;
use App\Http\Controllers\LoaiPhongController;
use App\Http\Controllers\PhongController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\BoPhanController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhieuThueController;
use App\Http\Controllers\HoaDonThanhToanController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\PhieuDichVuController;
use App\Http\Controllers\ChiTietPhieuDichVuController;
use App\Http\Controllers\TungTriggerController;
use App\Http\Controllers\TungProc1Controller;
use App\Http\Controllers\TungProc2Controller;
use App\Http\Controllers\TungView1Controller;
use App\Http\Controllers\TungView2Controller;
use App\Http\Controllers\LamView9Controller;
use App\Http\Controllers\LamView10Controller;
use App\Http\Controllers\LamProc9Controller;




Route::middleware(['auth'])->group(function () {
    Route::get('/thong-ke/phong', [TungProc1Controller::class, 'thongKePhongTheoLoaiGiuong'])->name('phong.tungproc1');
    Route::get('/nhanvien/thongke', [TungProc2Controller::class, 'thongKeNhanVien'])->name('nhanvien.tungproc2');
    Route::get('/phong/controng', [TungView1Controller::class, 'index'])->name('phong.tungview1');
    Route::get('/phieuthue/thongke', [TungView2Controller::class, 'index'])->name('phieuthue.tungview2');
    Route::get('/view9', [LamView9Controller::class, 'index'])->name('nhanvien.lamview9');
    Route::get('/view10', [LamView10Controller::class, 'index'])->name('dichvu.lamview10');
    Route::get('/dich-vu/khach-hang', [LamProc9Controller::class, 'getDanhSachKhachHang'])->name('dichvu.lamproc9');
    Route::resource('hoadonthanhtoan', HoaDonThanhToanController::class);
    Route::resource('loaiphong', LoaiPhongController::class);
    Route::resource('phong', PhongController::class);
    Route::resource('khachhang', KhachHangController::class);
    Route::resource('bophan', BoPhanController::class);
    Route::resource('nhanvien', NhanVienController::class);
    Route::resource('phieuthue', PhieuThueController::class);
    Route::resource('dichvu', DichVuController::class);
    Route::resource('phieudichvu', PhieuDichVuController::class);
    Route::resource('chitietphieu', ChiTietPhieuDichVuController::class);
    
});



Route::get('create-admin', [AdminSetupController::class, 'createAdmin']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route cho trang chủ
Route::middleware(['auth'])->get('/home', function () {
    return view('home');
})->name('home');

