<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhieuDichVu;
use App\Models\PhieuDichVu;
use App\Models\DichVu;
use Illuminate\Http\Request;

class ChiTietPhieuDichVuController extends Controller
{
    public function index()
    {
        $chitietphieus = ChiTietPhieuDichVu::with(['phieuDichVu', 'dichVu'])->paginate(10);
        return view('chitietphieu.index', compact('chitietphieus'));
    }

    public function create()
    {
        $phieudichvus = PhieuDichVu::all();
        $dichvus = DichVu::all();
        return view('chitietphieu.create', compact('phieudichvus', 'dichvus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaPhieuDV' => 'required|exists:phieudichvu,MaPhieuDV',
            'MaDV' => 'required|exists:dichvu,MaDV',
            'SoLuong' => 'required|integer|min:1',
            'DonGia' => 'required|numeric|min:0',
        ]);

        ChiTietPhieuDichVu::create($request->all());
        return redirect()->route('chitietphieu.index')->with('success', 'Chi Tiết Phiếu Dịch Vụ được thêm thành công.');
    }

    public function show($id)
    {
        $chitietphieu = ChiTietPhieuDichVu::with(['phieuDichVu', 'dichVu'])->findOrFail($id);
        return view('chitietphieu.show', compact('chitietphieu'));
    }

    public function edit($id)
    {
        $chitietphieu = ChiTietPhieuDichVu::findOrFail($id);
        $phieudichvus = PhieuDichVu::all();
        $dichvus = DichVu::all();
        return view('chitietphieu.edit', compact('chitietphieu', 'phieudichvus', 'dichvus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'MaPhieuDV' => 'required|exists:phieudichvu,MaPhieuDV',
            'MaDV' => 'required|exists:dichvu,MaDV',
            'SoLuong' => 'required|integer|min:1',
            'DonGia' => 'required|numeric|min:0',
        ]);

        $chitietphieu = ChiTietPhieuDichVu::findOrFail($id);
        $chitietphieu->update($request->all());
        return redirect()->route('chitietphieu.index')->with('success', 'Chi Tiết Phiếu Dịch Vụ được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $chitietphieu = ChiTietPhieuDichVu::findOrFail($id);
        $chitietphieu->delete();
        return redirect()->route('chitietphieu.index')->with('success', 'Chi Tiết Phiếu Dịch Vụ được xóa thành công.');
    }
}
