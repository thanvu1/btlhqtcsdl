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
    //Tùng Trigger1 : Cập nhật trạng thái phòng khi thêm phiếu thuê mới
    public function store(Request $request)
    {
        try {
            // Thêm phiếu thuê mới vào bảng PHIEUTHUE
            $phieuThue = PhieuThue::create($request->all());

            // Kiểm tra trạng thái của phòng sau khi trigger đã chạy
            $phong = Phong::where('MaPhong', $request->MaPhong)->first();

            // Kiểm tra xem tình trạng phòng có phải là 'Đã thuê'
            if ($phong && $phong->TinhTrang === 'Đã thuê') {
                // Trigger đã hoạt động, quay về trang index với thông báo thành công
                return redirect()->route('phieuthue.index')->with('success', 'Phiếu thuê đã được thêm thành công và trigger đã hoạt động!');
            } else {
                // Trigger không hoạt động, quay về trang index với cảnh báo
                return redirect()->route('phieuthue.index')->with('error', 'Phiếu thuê đã được thêm nhưng trigger không cập nhật trạng thái phòng.');
            }
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có, quay về trang index với thông báo lỗi
            return redirect()->route('phieuthue.index')->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
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
        try {
            // Tìm phiếu thuê cần xóa
            $phieuThue = PhieuThue::findOrFail($id);

            // Xóa phiếu thuê
            $phieuThue->delete();

            // Kiểm tra trạng thái phòng sau khi trigger chạy
            $phong = Phong::where('MaPhong', $phieuThue->MaPhong)->first();

            if ($phong && $phong->TinhTrang === 'Còn Trống') {
                // Trigger đã hoạt động, quay lại trang index với thông báo thành công
                return redirect()->route('phieuthue.index')->with('success', 'Phiếu thuê đã được hủy thành công và trigger đã cập nhật trạng thái phòng.');
            } else {
                // Trigger không hoạt động như mong đợi
                return redirect()->route('phieuthue.index')->with('error', 'Phiếu thuê đã được hủy nhưng trạng thái phòng chưa được cập nhật.');
            }
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return redirect()->route('phieuthue.index')->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}

