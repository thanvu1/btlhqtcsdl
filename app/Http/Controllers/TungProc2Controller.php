<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TungProc2Controller extends Controller
{
    public function thongKeNhanVien()
    {
        try {
            // Gọi stored procedure
            $thongKe = DB::select('EXEC ThongKeNhanVienTheoChucVu');

            // Trả về view và truyền dữ liệu thống kê
            return view('nhanvien.tungproc2', compact('thongKe'));
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
