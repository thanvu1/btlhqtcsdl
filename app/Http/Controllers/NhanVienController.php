<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use App\Models\BoPhan;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    public function index()
    {
        $nhanviens = NhanVien::with('boPhan')->paginate(10); // Phân trang và lấy thông tin bộ phận
        return view('nhanvien.index', compact('nhanviens'));
    }

    public function create()
    {
        $bophans = BoPhan::all(); // Lấy danh sách bộ phận để chọn
        return view('nhanvien.create', compact('bophans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'TenNV' => 'required|max:50',
            'NgaySinh' => 'nullable|date',
            'GioiTinh' => 'nullable|max:10',
            'SDT' => 'required|max:10',
            'CCCD' => 'nullable|max:15',
            'ChucVu' => 'nullable|max:20',
            'Luong' => 'required|numeric',
            'MaBP' => 'nullable|exists:bophan,MaBP',
        ]);

        NhanVien::create($request->all());
        return redirect()->route('nhanvien.index')->with('success', 'Nhân Viên được thêm thành công.');
    }

    public function show($id)
    {
        $nhanvien = NhanVien::with('boPhan')->findOrFail($id); // Lấy thông tin bộ phận
        return view('nhanvien.show', compact('nhanvien'));
    }

    public function edit($id)
    {
        $nhanvien = NhanVien::findOrFail($id);
        $bophans = BoPhan::all(); // Lấy danh sách bộ phận
        return view('nhanvien.edit', compact('nhanvien', 'bophans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'TenNV' => 'required|max:50',
            'NgaySinh' => 'nullable|date',
            'GioiTinh' => 'nullable|max:10',
            'SDT' => 'required|max:10',
            'CCCD' => 'nullable|max:15',
            'ChucVu' => 'nullable|max:20',
            'Luong' => 'required|numeric',
            'MaBP' => 'nullable|exists:bophan,MaBP',
        ]);

        $nhanvien = NhanVien::findOrFail($id);
        $nhanvien->update($request->all());
        return redirect()->route('nhanvien.index')->with('success', 'Nhân Viên được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $nhanvien = NhanVien::findOrFail($id);
        $nhanvien->delete();
        return redirect()->route('nhanvien.index')->with('success', 'Nhân Viên được xóa thành công.');
    }
}
