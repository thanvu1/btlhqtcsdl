<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChungFunction7Controller extends Controller
{
    /**
     * Hiển thị tổng số phòng đã thuê trong ngày.
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        try {
            // Lấy ngày từ yêu cầu
            $ngay = $request->get('Ngay', now()->toDateString()); // Mặc định là ngày hiện tại

            // Gọi function SQL để tính tổng số phòng đã thuê
            $tongSoPhong = DB::select('SELECT dbo.TinhTongSoPhongDaThueTrongNgay(?) AS TongSoPhong', [$ngay]);

            // Lấy kết quả đầu tiên
            $tongSoPhong = $tongSoPhong[0]->TongSoPhong ?? 0;

            // Trả về view và truyền dữ liệu
            return view('ChungFunction7.index', compact('tongSoPhong', 'ngay'));
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
