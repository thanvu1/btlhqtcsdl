<?php

use App\Http\Controllers\vDoanhThuTheoNgayController;
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
use App\Http\Controllers\TungViewController;

Route::middleware(['auth'])->group(function () {
    Route::get('/phong/thongke-tinhtrang', [PhongController::class, 'thongKeSoLuongPhongTheoTinhTrang'])->name('phong.thongke-tinhtrang');
    Route::get('/phong/solan', [PhongController::class, 'soLanSuDung'])->name('phong.solan');
    // Báo cáo doanh thu theo ngày
    Route::get('/baocao', [vDoanhThuTheoNgayController::class, 'index'])->name('baocao.index');
    Route::get('/phong/controng', [TungViewController::class, 'index'])->name('phong.controng');
    Route::get('/thong-ke/phong', [TungProc1Controller::class, 'thongKePhongTheoLoaiGiuong'])->name('phong.thongke');
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

