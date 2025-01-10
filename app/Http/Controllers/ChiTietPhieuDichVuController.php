<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhieuDichVu;
use App\Models\PhieuDichVu;
use App\Models\DichVu;
use Illuminate\Http\Request;

class ChiTietPhieuDichVuController extends Controller
{
    // 1) Lấy danh sách chi tiết phiếu, phân trang
    public function index()
    {
        // Eager Loading phieuDichVu và dichVu để giảm query N+1
        $chitietphieus = ChiTietPhieuDichVu::with(['phieuDichVu', 'dichVu'])
                            ->paginate(10);

        return view('chitietphieu.index', compact('chitietphieus'));
    }

    // 2) Form tạo mới
    public function create()
    {
        $phieudichvus = PhieuDichVu::all();
        $dichvus = DichVu::all();
        return view('chitietphieu.create', compact('phieudichvus', 'dichvus'));
    }

    // 3) Xử lý lưu record mới
    public function store(Request $request)
    {
        $request->validate([
            'MaPhieuDV' => 'required|exists:phieudichvu,MaPhieuDV',
            'MaDV'      => 'required|exists:dichvu,MaDV',
            'SoLuong'   => 'required|integer|min:0',
            'DonGia'    => 'required|numeric|min:0',
        ]);

        ChiTietPhieuDichVu::create($request->all());

        return redirect()->route('chitietphieu.index')
                         ->with('success', 'Chi Tiết Phiếu DV tạo thành công!');
    }

    // 4) Hiển thị chi tiết 1 record
    //    Phải nhận 2 tham số: $MaPhieuDV, $MaDV
    public function show($MaPhieuDV, $MaDV)
    {
        $chitietphieu = ChiTietPhieuDichVu::with(['phieuDichVu', 'dichVu'])
                            ->where('MaPhieuDV', $MaPhieuDV)
                            ->where('MaDV', $MaDV)
                            ->firstOrFail();

        return view('chitietphieu.show', compact('chitietphieu'));
    }

    // 5) Form edit
    public function edit($MaPhieuDV, $MaDV)
    {
        $chitietphieu = ChiTietPhieuDichVu::where('MaPhieuDV', $MaPhieuDV)
                            ->where('MaDV', $MaDV)
                            ->firstOrFail();

        $phieudichvus = PhieuDichVu::all();
        $dichvus = DichVu::all();

        return view('chitietphieu.edit', compact('chitietphieu', 'phieudichvus', 'dichvus'));
    }

    // 6) Cập nhật
    public function update(Request $request, $MaPhieuDV, $MaDV)
    {
        // 1) Tìm chi tiết phiếu
        $chitiet = ChiTietPhieuDichVu::where('MaPhieuDV', $MaPhieuDV)
            ->where('MaDV', $MaDV)
            ->firstOrFail();

        // 2) Validate
        $request->validate([
            'SoLuong' => 'required|integer|min:0',
            'DonGia'  => 'required|numeric|min:0',
        ]);

        // 3) Cập nhật
        $chitiet->update($request->all());

        // 4) Điều hướng về index
        return redirect()->route('chitietphieu.index')
                        ->with('success', 'Cập nhật thành công!');
    }
    // 7) Xoá
    public function destroy($MaPhieuDV, $MaDV)
    {
        // Thay vì firstOrFail() -> delete(), ta xóa trực tiếp bằng Query Builder:
        ChiTietPhieuDichVu::where('MaPhieuDV', $MaPhieuDV)
            ->where('MaDV', $MaDV)
            ->delete();

        return redirect()->route('chitietphieu.index')
                        ->with('success', 'Xoá Chi Tiết Phiếu DV thành công!');
    }
}
