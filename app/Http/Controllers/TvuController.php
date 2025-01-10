<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TvuController extends Controller
{
    public function index(Request $request)
    {
        $thang = $request->input('thang', date('m'));
        $nam = $request->input('nam', date('Y'));

        try {
            // Sử dụng Query Builder để gọi function và thực hiện phân trang
            $query = DB::table(DB::raw('fn_SoLanPhongDuocSuDungTrongThang(?, ?)'))
                ->setBindings([$nam, $thang]);

            $data = $query->paginate(10); // Số mục mỗi trang

            return view('tvu.func2', [
                'data' => $data,
                'thang' => $thang,
                'nam' => $nam,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Lỗi khi truy vấn dữ liệu: ' . $e->getMessage()]);
        }
    }

    public function kiemTraTinhTrangPhong(Request $request)
    {
        $maPhong = $request->input('maPhong', '');

        $tinhTrang = null;
        if ($maPhong) {
            try {
                // Gọi hàm fn_KiemTraTinhTrangPhong
                $tinhTrang = DB::select('SELECT dbo.fn_KiemTraTinhTrangPhong(?) AS TinhTrang', [$maPhong]);
                $tinhTrang = $tinhTrang[0]->TinhTrang ?? 'Không tìm thấy thông tin phòng';
            } catch (\Exception $e) {
                $tinhTrang = 'Có lỗi xảy ra: ' . $e->getMessage();
            }
        }

        return view('tvu.func1', compact('tinhTrang', 'maPhong'));
    }

    public function thongKeDoanhThu(Request $request)
    {
        // Lấy tham số tháng và năm từ request, sử dụng giá trị mặc định nếu không có
        $thang = $request->input('thang', date('m'));
        $nam = $request->input('nam', date('Y'));

        try {
            // Debug: Kiểm tra giá trị tham số đầu vào
            // dd($thang, $nam);

            // Gọi stored procedure với các tham số
            $doanhThu = DB::select('EXEC sp_ThongKeDoanhThuTheoThangNam @Nam = ?, @Thang = ?', [$nam, $thang]);

            // Xử lý dữ liệu trả về, đảm bảo kết quả hợp lệ
            $doanhThu = collect($doanhThu)->map(function ($row) {
                return (array) $row;
            })->first(); // Lấy bản ghi đầu tiên (vì kết quả thường chỉ có một dòng)

            // Kiểm tra kết quả trả về, đảm bảo không bị NULL hoặc lỗi
            if (!$doanhThu) {
                $doanhThu = [
                    'Thang' => $thang,
                    'Nam' => $nam,
                    'TongDoanhThu' => 0, // Gán giá trị mặc định nếu không có dữ liệu
                ];
            }

            // Chuyển dữ liệu sang view
            return view('tvu.proc1', compact('doanhThu', 'thang', 'nam'));
        } catch (\Exception $e) {
            // Xử lý lỗi và hiển thị thông báo
            return back()->withErrors(['error' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }
}
