<?php

namespace App\Http\Controllers;

use App\Models\PhieuThue;
use App\Models\Phong;
use App\Models\KhachHang;
use App\Models\NhanVien;
use Illuminate\Http\Request;

class PhieuThueController extends Controller
{
    public function index()
    {
        $phieuthues = PhieuThue::with(['phong', 'khachHang', 'nhanVien'])->paginate(10);
        return view('phieuthue.index', compact('phieuthues'));
    }

    public function create()
    {
        $phongs = Phong::where('TinhTrang', 'Còn trống')->get();
        $khachhangs = KhachHang::all();
        $nhanviens = NhanVien::all();
        return view('phieuthue.create', compact('phongs', 'khachhangs', 'nhanviens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaPhong' => 'required|exists:phong,MaPhong',
            'MaKH' => 'required|exists:khachhang,MaKH',
            'NgayThue' => 'required|date',
            'NgayTra' => 'required|date|after_or_equal:NgayThue',
            'GiaMotNgay' => 'required|numeric',
            'MaNV' => 'nullable|exists:nhanvien,MaNV',
        ]);

        PhieuThue::create($request->all());

        // Cập nhật tình trạng phòng
        $phong = Phong::findOrFail($request->MaPhong);
        $phong->TinhTrang = 'Đã thuê';
        $phong->save();

        return redirect()->route('phieuthue.index')->with('success', 'Phiếu Thuê được thêm thành công.');
    }

    public function show($id)
    {
        $phieuthue = PhieuThue::with(['phong', 'khachHang', 'nhanVien'])->findOrFail($id);
        return view('phieuthue.show', compact('phieuthue'));
    }

    public function edit($id)
    {
        $phieuthue = PhieuThue::findOrFail($id);
        $phongs = Phong::where('TinhTrang', 'Còn trống')->orWhere('MaPhong', $phieuthue->MaPhong)->get();
        $khachhangs = KhachHang::all();
        $nhanviens = NhanVien::all();
        return view('phieuthue.edit', compact('phieuthue', 'phongs', 'khachhangs', 'nhanviens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'MaPhong' => 'required|exists:phong,MaPhong',
            'MaKH' => 'required|exists:khachhang,MaKH',
            'NgayThue' => 'required|date',
            'NgayTra' => 'required|date|after_or_equal:NgayThue',
            'GiaMotNgay' => 'required|numeric',
            'MaNV' => 'nullable|exists:nhanvien,MaNV',
        ]);

        $phieuthue = PhieuThue::findOrFail($id);
        $phieuthue->update($request->all());

        return redirect()->route('phieuthue.index')->with('success', 'Phiếu Thuê được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $phieuthue = PhieuThue::findOrFail($id);

        // Cập nhật tình trạng phòng
        $phong = Phong::findOrFail($phieuthue->MaPhong);
        $phong->TinhTrang = 'Còn trống';
        $phong->save();

        $phieuthue->delete();
        return redirect()->route('phieuthue.index')->with('success', 'Phiếu Thuê được xóa thành công.');
    }
}

