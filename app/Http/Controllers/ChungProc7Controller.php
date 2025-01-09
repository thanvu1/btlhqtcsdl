<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChungProc7Controller extends Controller
{
    /**
     * Hiển thị form kiểm tra trạng thái phòng.
     */
    public function index(Request $request)
    {
        $maPhong = $request->input('MaPhong'); // Lấy mã phòng từ form
        $ketQua = null; // Kết quả kiểm tra trạng thái phòng

        if ($maPhong) {
            try {
                // Gọi thủ tục kiểm tra trạng thái phòng
                $result = DB::select('EXEC KiemTraPhongDaThue @MaPhong = ?', [$maPhong]);

                // Kiểm tra nếu thủ tục trả về kết quả
                if (!empty($result)) {
                    $ketQua = $result[0]->KetQua ?? 'Không xác định';
                } else {
                    $ketQua = 'Không tìm thấy phòng có mã: ' . $maPhong;
                }
            } catch (\Exception $e) {
                // Xử lý lỗi khi gọi thủ tục
                $ketQua = 'Đã xảy ra lỗi: ' . $e->getMessage();
            }
        }

        // Trả về view với kết quả
        return view('ChungProc7.index', compact('ketQua', 'maPhong'));
    }
}
