<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LinhTrig5Controller extends Controller
{
    // Hiển thị danh sách phòng
    public function index()
    {
        // Lấy danh sách phòng từ cơ sở dữ liệu
        $phongs = DB::table('PHONG')->get();
        return view('phong.trig5', compact('phongs'));
    }

    // Xử lý xóa phòng
    public function destroy($id)
{
    try {
        DB::table('PHONG')->where('MaPhong', $id)->delete();

        return response()->json([
            'message' => 'Phòng đã được xóa thành công.',
        ], 200);
    } catch (\Exception $e) {
        // Bắt lỗi do trigger trả về
        return response()->json([
            'message' => 'Không thể xóa phòng: ' . $e->getMessage(),
        ], 400);
    }
}
}
