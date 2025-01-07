<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TungView2Controller extends Controller
{
    public function index()
    {
        try {
            // Truy vấn trực tiếp từ view
            $thongKe = DB::select('SELECT * FROM ThongKePhongThueTheoThang');

            // Trả về view và truyền dữ liệu thống kê
            return view('phieuthue.tungview2', compact('thongKe'));
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
