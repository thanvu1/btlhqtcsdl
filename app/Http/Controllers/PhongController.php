<?php

namespace App\Http\Controllers;

use App\Models\Phong;
use App\Models\LoaiPhong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhongController extends Controller
{
    // Hiển thị danh sách phòng
    public function index(Request $request)
    {
        $phongs = Phong::with('loaiPhong')->paginate(10);
        return view('phong.index', compact('phongs'));
    }
    //Tùng-PROC1: Thống kê phòng theo loại giường – Đếm số lượng phòng theo loại giường.
    public function thongKePhong()
    {
        $thongke = DB::select('EXEC ThongKePhongTheoLoaiGiuong');
        return view('phong.thongke', compact('thongke'));
    }

    // Hiển thị form tạo phòng mới
    public function create()
    {
        $loaiphongs = LoaiPhong::all();
        return view('phong.create', compact('loaiphongs'));
    }

    // Lưu phòng mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'MaPhong' => 'required|unique:phong,MaPhong|max:10',
            'TenPhong' => 'required|max:20',
            'TinhTrang' => 'required|in:Còn trống,Đã thuê,Sửa chữa', // Giá trị hợp lệ cho TinhTrang
            'MaLP' => 'required|string|exists:loaiphong,MaLP', // Kiểm tra MaLP phải tồn tại
            'GhiChu' => 'nullable|max:1000', // Ghi chú không bắt buộc
        ]);

        Phong::create($request->all());
        return redirect()->route('phong.index')->with('success', 'Phòng được thêm thành công.');
    }

    // Hiển thị thông tin chi tiết của một phòng
    public function show($id)
    {
        $phong = Phong::with('loaiPhong')->findOrFail($id);
        return view('phong.show', compact('phong'));
    }

    // Hiển thị form chỉnh sửa phòng
    public function edit($id)
    {
        $phong = Phong::findOrFail($id);
        $loaiphongs = LoaiPhong::all();
        return view('phong.edit', compact('phong', 'loaiphongs'));
    }

    // Cập nhật thông tin phòng
    public function update(Request $request, $id)
    {
        $request->validate([
            'TenPhong' => 'required|max:20',
            'TinhTrang' => 'required|in:Còn trống,Đã thuê,Sửa chữa',
            'MaLP' => 'required|string|exists:loaiphong,MaLP',
            'GhiChu' => 'nullable|max:1000',
        ]);

        $phong = Phong::findOrFail($id);
        $phong->update($request->all());
        return redirect()->route('phong.index')->with('success', 'Phòng được cập nhật thành công.');
    }

    // Xóa một phòng
    public function destroy($id)
    {
        $phong = Phong::findOrFail($id);
        $phong->delete();
        return redirect()->route('phong.index')->with('success', 'Phòng được xóa thành công.');
    }

    public function thongKeSoLuongPhongTheoTinhTrang()
    {
        try {
            // Gọi stored procedure
            $data = DB::select('EXEC sp_ThongKeSoLuongPhongTheoTinhTrang');

            // Trả về view cùng với dữ liệu
            return view('phong.thongke-tinhtrang', compact('data'));
        } catch (\Exception $e) {
            return view('phong.thongke-tinhtrang', ['error' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }
}
