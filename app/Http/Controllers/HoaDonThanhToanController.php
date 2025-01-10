<?php

namespace App\Http\Controllers;

use App\Models\HoaDonThanhToan;
use App\Models\PhieuThue;
use App\Models\NhanVien;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HoaDonThanhToanController extends Controller
{
    public function index()
    {
        $hoadons = HoaDonThanhToan::with(['phieuThue', 'nhanVien', 'khachHang'])->paginate(10);
        return view('hoadonthanhtoan.index', compact('hoadons'));
    }

    public function create()
    {
        $phieuthues = PhieuThue::all();
        $nhanviens = NhanVien::all();
        $khachhangs = KhachHang::all();
        return view('hoadonthanhtoan.create', compact('phieuthues', 'nhanviens', 'khachhangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'TenKH' => 'required|max:50',
            'MaKH' => 'required|exists:khachhang,MaKH',
            'MaNV' => 'required|exists:nhanvien,MaNV',
            'MaPT' => 'required|exists:phieuthue,MaPT',
            'TongTien' => 'required|numeric',
        ]);

        HoaDonThanhToan::create($request->all());
        return redirect()->route('hoadonthanhtoan.index')->with('success', 'Hóa Đơn Thanh Toán được thêm thành công.');
    }

    public function show($id)
    {
        $hoadon = HoaDonThanhToan::with(['phieuThue', 'nhanVien', 'khachHang'])->findOrFail($id);
        return view('hoadonthanhtoan.show', compact('hoadon'));
    }

    public function edit($id)
    {
        $hoadon = HoaDonThanhToan::findOrFail($id);
        $phieuthues = PhieuThue::all();
        $nhanviens = NhanVien::all();
        $khachhangs = KhachHang::all();
        return view('hoadonthanhtoan.edit', compact('hoadon', 'phieuthues', 'nhanviens', 'khachhangs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NgayLap' => 'required|date',
            'TenKH' => 'required|max:50',
            'MaKH' => 'required|exists:khachhang,MaKH',
            'MaNV' => 'required|exists:nhanvien,MaNV',
            'MaPT' => 'required|exists:phieuthue,MaPT',
            'TongTien' => 'required|numeric',
        ]);

        $hoadon = HoaDonThanhToan::findOrFail($id);
        $hoadon->update($request->all());
        return redirect()->route('hoadonthanhtoan.index')->with('success', 'Hóa Đơn Thanh Toán được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $hoadon = HoaDonThanhToan::findOrFail($id);
        $hoadon->delete();
        return redirect()->route('hoadonthanhtoan.index')->with('success', 'Hóa Đơn Thanh Toán được xóa thành công.');
    }

    // VIEW 6
    public function danhsach()
    {
        // Truy vấn dữ liệu từ View_6
        $danhsachhoadon = DB::table('View_6')->orderByRaw('CAST(MaHD AS INT)')->paginate(10);

        // Trả dữ liệu ra view
        return view('hoadonthanhtoan.view6', compact('danhsachhoadon'));
    }
}
