<?php

namespace App\Http\Controllers;

use App\Models\BoPhan;
use Illuminate\Http\Request;

class BoPhanController extends Controller
{
    public function index()
    {
        $bophans = BoPhan::paginate(10); // Phân trang
        return view('bophan.index', compact('bophans'));

    }

    public function create()
    {
        $bophans = BoPhan::all();
        return view('bophan.create', compact('bophans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaBP' => 'required|unique:bophan|max:10',
            'TenBP' => 'required|max:50',
            'MoTa' => 'nullable',
        ]);

        BoPhan::create($request->all());
        return redirect()->route('bophan.index')->with('success', 'Bộ Phận được thêm thành công.');
    }

    public function show($id)
    {
        $bophan = BoPhan::findOrFail($id);
        return view('bophan.show', compact('bophan'));
    }

    public function edit($id)
    {
        $bophan = BoPhan::findOrFail($id);
        return view('bophan.edit', compact('bophan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'TenBP' => 'required|max:50',
            'MoTa' => 'nullable',
        ]);

        $bophan = BoPhan::findOrFail($id);
        $bophan->update($request->all());
        return redirect()->route('bophan.index')->with('success', 'Bộ Phận được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $bophan = BoPhan::findOrFail($id);
        $bophan->delete();
        return redirect()->route('bophan.index')->with('success', 'Bộ Phận được xóa thành công.');
    }
}
