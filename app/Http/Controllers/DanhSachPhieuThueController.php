<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewDanhSachPhieuThue;

class DanhSachPhieuThueController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu từ view và phân trang
        $data = ViewDanhSachPhieuThue::paginate(10);

        // Trả về view với dữ liệu
        return view('phieuthue.vw_dspt', compact('data'));
    }
}
