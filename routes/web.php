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
use App\Http\Controllers\DanhSachPhieuThueController;
use App\Http\Controllers\TvuController;
use App\Http\Controllers\TungProc2Controller;
use App\Http\Controllers\TungView1Controller;
use App\Http\Controllers\TungView2Controller;
use App\Http\Controllers\TungFunctionController;

Route::middleware(['auth'])->group(function () {
    Route::get('/tvu/thong-ke-doanh-thu', [TvuController::class, 'thongKeDoanhThu'])->name('tvu.thongkedoanhthutheothangnam');
    Route::get('/tvu/kiem-tra-tinh-trang', [TvuController::class, 'kiemTraTinhTrangPhong'])->name('tvu.kiem-tra-tinh-trang');
    Route::get('/tvu', [TvuController::class, 'index'])->name('tvu.solanphongduocsudungtrongthang');
    Route::get('/phieuthue/vw_dspt', [DanhSachPhieuThueController::class, 'index'])->name('phieuthue.vw_dspt');
    Route::get('/phong/thongke-tinhtrang', [PhongController::class, 'thongKeSoLuongPhongTheoTinhTrang'])->name('phong.thongke-tinhtrang');
    // Báo cáo doanh thu theo ngày
    Route::get('/baocao', [vDoanhThuTheoNgayController::class, 'index'])->name('baocao.index');
    Route::get('/thong-ke/phong', [TungProc1Controller::class, 'thongKePhongTheoLoaiGiuong'])->name('phong.tungproc1');
    Route::get('/nhanvien/thongke', [TungProc2Controller::class, 'thongKeNhanVien'])->name('nhanvien.tungproc2');
    Route::get('/phong/controng', [TungView1Controller::class, 'index'])->name('phong.tungview1');
    Route::get('/phieuthue/thongke', [TungView2Controller::class, 'index'])->name('phieuthue.tungview2');
    Route::get('/hoadonthanhtoan/tongtien', [TungFunctionController::class, 'index'])->name('hoadonthanhtoan.tungfunction');
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

