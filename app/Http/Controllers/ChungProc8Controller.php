<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ChungProc8Controller extends Controller
{
    public function index()
    {
        // Gọi stored procedure ThongKeKhachHangTheoQuocTich để lấy dữ liệu
        $thongKeQuocTich = DB::select('EXEC ThongKeKhachHangTheoQuocTich');

        // Trả về view cùng với dữ liệu
        return view('ChungProc8.index', ['thongKeQuocTich' => $thongKeQuocTich]);
    }
}

