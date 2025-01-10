<?php

namespace App\Http\Controllers;

use App\Models\View5;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LinhView5Controller extends Controller
{
    public function index()
    {
        // Truy vấn dữ liệu từ view View_5
        $danhsachdichvu = DB::select('SELECT * FROM View_5');

        // Trả dữ liệu về giao diện
        return view('khachhang.view5', compact('danhsachdichvu'));
    }
}
