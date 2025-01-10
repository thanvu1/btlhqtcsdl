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
use App\Http\Controllers\LinhView5Controller;
use App\Http\Controllers\LinhTrig5Controller;


Route::middleware(['auth'])->group(function () {
    Route::get('chitietphieu', [ChiTietPhieuDichVuController::class, 'index'])
    ->name('chitietphieu.index');

    Route::get('chitietphieu/create', [ChiTietPhieuDichVuController::class, 'create'])
        ->name('chitietphieu.create');

    Route::post('chitietphieu', [ChiTietPhieuDichVuController::class, 'store'])
        ->name('chitietphieu.store');

    // 2 tham số: {MaPhieuDV}/{MaDV}
    Route::get('chitietphieu/{MaPhieuDV}/{MaDV}', [ChiTietPhieuDichVuController::class, 'show'])
        ->name('chitietphieu.show');

    Route::get('chitietphieu/{MaPhieuDV}/{MaDV}/edit', [ChiTietPhieuDichVuController::class, 'edit'])
        ->name('chitietphieu.edit');

    Route::put('chitietphieu/{MaPhieuDV}/{MaDV}', [ChiTietPhieuDichVuController::class, 'update'])
        ->name('chitietphieu.update');
    

    Route::delete('chitietphieu/{MaPhieuDV}/{MaDV}', [ChiTietPhieuDichVuController::class, 'destroy'])
        ->name('chitietphieu.destroy');
    Route::get('/hoadonthanhtoan/view6', [HoaDonThanhToanController::class, 'danhsach'])->name('hoadonthanhtoan.view6');
    Route::get('/tvu/thong-ke-doanh-thu', [TvuController::class, 'thongKeDoanhThu'])->name('tvu.thongkedoanhthutheothangnam');
    Route::get('/tvu/kiem-tra-tinh-trang', [TvuController::class, 'kiemTraTinhTrangPhong'])->name('tvu.kiem-tra-tinh-trang');
    Route::get('/tvu', [TvuController::class, 'index'])->name('tvu.solanphongduocsudungtrongthang');
    Route::get('/phieuthue/vw_dspt', [DanhSachPhieuThueController::class, 'index'])->name('phieuthue.vw_dspt');
    Route::get('/phong/thongke-tinhtrang', [PhongController::class, 'thongKeSoLuongPhongTheoTinhTrang'])->name('phong.thongke-tinhtrang');
    // Báo cáo doanh thu theo ngày
    Route::get('/baocao', [vDoanhThuTheoNgayController::class, 'index'])->name('baocao.index');
    Route::get('chitietphieu/{MaPhieuDV}/{MaDV}/edit', [ChiTietPhieuDichVuController::class, 'edit'])->name('chitietphieu.edit');
    Route::get('/thong-ke/phong', [TungProc1Controller::class, 'thongKePhongTheoLoaiGiuong'])->name('phong.tungproc1');
    Route::get('/nhanvien/thongke', [TungProc2Controller::class, 'thongKeNhanVien'])->name('nhanvien.tungproc2');
    Route::get('/phong/controng', [TungView1Controller::class, 'index'])->name('phong.tungview1');
    Route::get('/phieuthue/thongke', [TungView2Controller::class, 'index'])->name('phieuthue.tungview2');
    Route::get('/hoadonthanhtoan/tongtien', [TungFunctionController::class, 'index'])->name('hoadonthanhtoan.tungfunction');
    Route::get('/khachhang/view5', [LinhView5Controller::class, 'index'])->name('khachhang.view5');
    Route::get('/hoadon', [HoaDonThanhToanController::class, 'danhsach'])->name('hoadonthanhtoan.view6');
    Route::delete('/phong-trig5/{id}', [LinhTrig5Controller::class, 'destroy'])->name('phong.destroy');
    Route::resource('hoadonthanhtoan', HoaDonThanhToanController::class);
    Route::resource('loaiphong', LoaiPhongController::class);
    Route::resource('phong', PhongController::class);
    Route::resource('khachhang', KhachHangController::class);
    Route::resource('bophan', BoPhanController::class);
    Route::resource('nhanvien', NhanVienController::class);
    Route::resource('phieuthue', PhieuThueController::class);
    Route::resource('dichvu', DichVuController::class);
    Route::resource('phieudichvu', PhieuDichVuController::class);
    
   
    
    
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

