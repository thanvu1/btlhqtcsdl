<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChungFunction8Controller extends Controller
{
    /**
     * Hiển thị danh sách các dịch vụ đã sử dụng từ mã phiếu thuê.
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function search(Request $request)
    {
        try {
            // Lấy mã phiếu thuê từ yêu cầu
            $MaPT = $request->get('MaPT');

            // Kiểm tra xem mã phiếu thuê có được cung cấp hay không
            if (!$MaPT) {
                return redirect()->back()->with('error', 'Vui lòng nhập mã phiếu thuê.');
            }

            // Gọi function SQL để lấy danh sách dịch vụ
            $dichVuDaSuDung = DB::select('SELECT * FROM DanhSachDichVuDaSuDung(?)', [$MaPT]);

            // Nếu không tìm thấy dữ liệu
            if (empty($dichVuDaSuDung)) {
                return redirect()->back()->with('error', 'Không tìm thấy dịch vụ nào với mã phiếu thuê này.');
            }

            // Trả về view và truyền dữ liệu
            return view('ChungFunction8.index', compact('dichVuDaSuDung', 'MaPT'));
        } catch (\Exception $e) {
            // Xử lý lỗi và trả về thông báo
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
