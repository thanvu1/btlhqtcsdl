<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function index()
    {
        $khachhangs = KhachHang::paginate(10);
        return view('khachhang.index', compact('khachhangs'));
    }

    public function create()
    {
        return view('khachhang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaKH' => 'required|unique:khachhang|max:10',
            'HoTen' => 'required|max:50',
            'NgaySinh' => 'nullable|date',
            'SDT' => 'required|max:10',
            'QuocTich' => 'nullable|max:50',
        ]);

        KhachHang::create($request->all());
        return redirect()->route('khachhang.index')->with('success', 'Khách Hàng được thêm thành công.');
    }

    public function show($id)
    {
        $khachhang = KhachHang::findOrFail($id);
        return view('khachhang.show', compact('khachhang'));
    }

    public function edit($id)
    {
        $khachhang = KhachHang::findOrFail($id);
        return view('khachhang.edit', compact('khachhang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'HoTen' => 'required|max:50',
            'NgaySinh' => 'nullable|date',
            'SDT' => 'required|max:10',
            'QuocTich' => 'nullable|max:50',
        ]);

        $khachhang = KhachHang::findOrFail($id);
        $khachhang->update($request->all());
        return redirect()->route('khachhang.index')->with('success', 'Khách Hàng được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $khachhang = KhachHang::findOrFail($id);
        $khachhang->delete();
        return redirect()->route('khachhang.index')->with('success', 'Khách Hàng được xóa thành công.');
    }
}
