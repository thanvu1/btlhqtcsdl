<?php

namespace App\Http\Controllers;

use App\Models\PhieuDichVu;
use App\Models\PhieuThue;
use Illuminate\Http\Request;

class PhieuDichVuController extends Controller
{
    public function index()
    {
        $phieudichvus = PhieuDichVu::with('phieuThue')->paginate(10);
        return view('phieudichvu.index', compact('phieudichvus'));
    }

    public function create()
    {
        $phieuthues = PhieuThue::all();
        return view('phieudichvu.create', compact('phieuthues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaPhieuDV' => 'required|unique:phieudichvu,MaPhieuDV',
            'NgayLap' => 'required|date',
            'TongTien' => 'required|numeric',
            'MaPT' => 'nullable|exists:phieuthue,MaPT',
            
        ]);

        PhieuDichVu::create($request->all());
        return redirect()->route('phieudichvu.index')->with('success', 'Phiếu Dịch Vụ được thêm thành công.');
    }

    public function show($id)
    {
        $phieudichvu = PhieuDichVu::with('phieuThue')->findOrFail($id);
        return view('phieudichvu.show', compact('phieudichvu'));
    }

    public function edit($id)
    {
        $phieudichvu = PhieuDichVu::findOrFail($id);
        $phieuthues = PhieuThue::all();
        return view('phieudichvu.edit', compact('phieudichvu', 'phieuthues'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NgayLap' => 'required|date',
            'TongTien' => 'required|numeric',
            'MaPT' => 'nullable|exists:phieuthue,MaPT',
        ]);

        $phieudichvu = PhieuDichVu::findOrFail($id);
        $phieudichvu->update($request->all());
        return redirect()->route('phieudichvu.index')->with('success', 'Phiếu Dịch Vụ được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $phieudichvu = PhieuDichVu::findOrFail($id);
        $phieudichvu->delete();
        return redirect()->route('phieudichvu.index')->with('success', 'Phiếu Dịch Vụ được xóa thành công.');
    }
}
