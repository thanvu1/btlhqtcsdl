<?php

namespace App\Http\Controllers;

use App\Models\LoaiPhong;
use Illuminate\Http\Request;

class LoaiPhongController extends Controller
{
    public function index()
    {
        $loaiphongs = LoaiPhong::paginate(10);
        return view('loaiphong.index', compact('loaiphongs'));
    }

    public function create()
    {
        return view('loaiphong.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaLP' => 'required|unique:loaiphong|max:15',
            'TenLP' => 'required|max:50',
            'LoaiGiuong' => 'required|max:15',
            'DonGia' => 'required|numeric',
        ]);

        LoaiPhong::create($request->all());
        return redirect()->route('loaiphong.index')->with('success', 'Loại Phòng được thêm thành công.');
    }

    public function show($id)
    {
        $loaiphong = LoaiPhong::findOrFail($id);
        return view('loaiphong.show', compact('loaiphong'));
    }

    public function edit($id)
    {
        $loaiphong = LoaiPhong::findOrFail($id);
        return view('loaiphong.edit', compact('loaiphong'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'TenLP' => 'required|max:50',
            'LoaiGiuong' => 'required|max:15',
            'DonGia' => 'required|numeric',
        ]);

        $loaiphong = LoaiPhong::findOrFail($id);
        $loaiphong->update($request->all());
        return redirect()->route('loaiphong.index')->with('success', 'Loại Phòng được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $loaiphong = LoaiPhong::findOrFail($id);
        $loaiphong->delete();
        return redirect()->route('loaiphong.index')->with('success', 'Loại Phòng được xóa thành công.');
    }
}
