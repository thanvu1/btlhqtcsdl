<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class vDoanhThuTheoNgayController extends Controller
{
    /**
     * Hiển thị danh sách doanh thu theo ngày.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Lấy ngày bắt đầu và ngày kết thúc từ request
        $ngayBatDau = $request->input('ngay_bat_dau');
        $ngayKetThuc = $request->input('ngay_ket_thuc');

        // Truy vấn dữ liệu từ view vw_BaoCaoDoanhThuTheoNgay
        $query = DB::table('vw_BaoCaoDoanhThuTheoNgay');

        // Thêm điều kiện tìm kiếm theo ngày nếu có
        if ($ngayBatDau && $ngayKetThuc) {
            $query->whereBetween('Ngay', [$ngayBatDau, $ngayKetThuc]);
        }

        // Phân trang dữ liệu
        $baoCaoDoanhThu = $query->paginate(10);

        // Trả dữ liệu ra view
        return view('baocao.index', compact('baoCaoDoanhThu', 'ngayBatDau', 'ngayKetThuc'));
    }
}
