<?php

namespace App\Http\Controllers;

use App\Models\DichVu;
use Illuminate\Http\Request;

class DichVuController extends Controller
{
    public function index()
    {
        $dichvus = DichVu::paginate(10);
        return view('dichvu.index', compact('dichvus'));
    }

    public function create()
    {
        return view('dichvu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaDV' => 'required|unique:dichvu|max:10',
            'TenDV' => 'required|max:50',
            'DonGia' => 'required|numeric',
        ]);

        DichVu::create($request->all());
        return redirect()->route('dichvu.index')->with('success', 'Dịch Vụ được thêm thành công.');
    }

    public function show($id)
    {
        $dichvu = DichVu::findOrFail($id);
        return view('dichvu.show', compact('dichvu'));
    }

    public function edit($id)
    {
        $dichvu = DichVu::findOrFail($id);
        return view('dichvu.edit', compact('dichvu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'TenDV' => 'required|max:50',
            'DonGia' => 'required|numeric',
        ]);

        $dichvu = DichVu::findOrFail($id);
        $dichvu->update($request->all());
        return redirect()->route('dichvu.index')->with('success', 'Dịch Vụ được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $dichvu = DichVu::findOrFail($id);
        $dichvu->delete();
        return redirect()->route('dichvu.index')->with('success', 'Dịch Vụ được xóa thành công.');
    }
}
