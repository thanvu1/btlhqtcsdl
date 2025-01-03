<?php

namespace App\Http\Controllers;

use App\Models\Phong;
use App\Models\LoaiPhong;
use Illuminate\Http\Request;

class PhongController extends Controller
{
    public function index()
    {
        $phongs = Phong::with('loaiPhong')->paginate(10);
        return view('phong.index', compact('phongs'));
    }

    public function create()
    {
        $loaiphongs = LoaiPhong::all();
        return view('phong.create', compact('loaiphongs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaPhong' => 'required|unique:phong|max:10',
            'TenPhong' => 'required|max:20',
            'TinhTrang' => 'required|max:20',
            'MaLP' => 'required|exists:loaiphong,MaLP',
        ]);

        Phong::create($request->all());
        return redirect()->route('phong.index')->with('success', 'Phòng được thêm thành công.');
    }

    public function show($id)
    {
        $phong = Phong::with('loaiPhong')->findOrFail($id);
        return view('phong.show', compact('phong'));
    }

    public function edit($id)
    {
        $phong = Phong::findOrFail($id);
        $loaiphongs = LoaiPhong::all();
        return view('phong.edit', compact('phong', 'loaiphongs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'TenPhong' => 'required|max:20',
            'TinhTrang' => 'required|max:20',
            'MaLP' => 'required|exists:loaiphong,MaLP',
        ]);

        $phong = Phong::findOrFail($id);
        $phong->update($request->all());
        return redirect()->route('phong.index')->with('success', 'Phòng được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $phong = Phong::findOrFail($id);
        $phong->delete();
        return redirect()->route('phong.index')->with('success', 'Phòng được xóa thành công.');
    }
}
