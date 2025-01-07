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
        $phieuthue = PhieuThue::findOrFail($id); // Lấy phiếu thuê theo ID
        $phongs = Phong::where('TinhTrang', 'Còn trống')
            ->orWhere('MaPhong', $phieuthue->MaPhong) // Bao gồm phòng hiện tại nếu đã thuê
            ->get();
        $khachhangs = KhachHang::all();
        $nhanviens = NhanVien::all();

        return view('phieuthue.edit', compact('phieuthue', 'phongs', 'khachhangs', 'nhanviens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NgayThue' => 'required|date',
            'NgayTra' => 'required|date|after_or_equal:NgayThue',
            'MaKH' => 'required|exists:khachhang,MaKH',
            'MaPhong' => 'required|exists:phong,MaPhong',
        ]);

        $phieuthue = PhieuThue::findOrFail($id);

        try {
            // Kiểm tra nếu phòng thay đổi
            if ($phieuthue->MaPhong !== $request->MaPhong) {
                // Đánh dấu phòng cũ là "Còn trống"
                Phong::where('MaPhong', $phieuthue->MaPhong)->update(['TinhTrang' => 'Còn trống']);
                // Đánh dấu phòng mới là "Đã thuê"
                Phong::where('MaPhong', $request->MaPhong)->update(['TinhTrang' => 'Đã thuê']);
            }

            // Cập nhật phiếu thuê
            $phieuthue->update($request->only(['NgayThue', 'NgayTra', 'MaKH', 'MaPhong']));

            return redirect()->route('phieuthue.index')->with('success', 'Phiếu Thuê được cập nhật thành công.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
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

