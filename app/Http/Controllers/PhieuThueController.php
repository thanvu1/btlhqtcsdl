<?php

namespace App\Http\Controllers;

use App\Models\PhieuThue;
use App\Models\Phong;
use App\Models\KhachHang;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhieuThueController extends Controller
{
    public function index()
    {
        $phieuthues = PhieuThue::with(['phong', 'khachHang', 'nhanVien'])->paginate(10);
        return view('phieuthue.index', compact('phieuthues'));
    }

    // public function create()
    // {
    //     $phongs = Phong::where('TinhTrang', 'Còn trống')->get();
    //     $khachhangs = KhachHang::all();
    //     $nhanviens = NhanVien::all();
    //     return view('phieuthue.create', compact('phongs', 'khachhangs', 'nhanviens'));
    // }

    public function create()
        {
            $phongs = DB::table('PHONG')
                ->join('LOAIPHONG', 'PHONG.MaLP', '=', 'LOAIPHONG.MaLP')
                ->where('PHONG.TinhTrang', 'Còn trống')
                ->select('PHONG.MaPhong', 'LOAIPHONG.DonGia')
                ->get();

            $khachhangs = KhachHang::all();
            $nhanviens = NhanVien::all();

            return view('phieuthue.create', compact('phongs', 'khachhangs', 'nhanviens'));
        }

    //Tùng Trigger1 : Cập nhật trạng thái phòng khi thêm phiếu thuê mới
    // public function store(Request $request)
    // {
    //     try {
    //         // Thêm phiếu thuê mới vào bảng PHIEUTHUE
    //         $phieuThue = PhieuThue::create($request->all());

    //         // Kiểm tra trạng thái của phòng sau khi trigger chạy
    //         $phong = Phong::where('MaPhong', $request->MaPhong)->first();

    //         if ($phong && $phong->TinhTrang === 'Đã thuê') {
    //             // Trigger đã hoạt động, quay về trang index với thông báo thành công
    //             return redirect()->route('phieuthue.index')->with('success', 'Phiếu thuê đã được thêm thành công và trigger đã hoạt động!');
    //         } else {
    //             // Trigger không hoạt động, quay về trang index với cảnh báo
    //             return redirect()->route('phieuthue.index')->with('error', 'Phiếu thuê đã được thêm nhưng trigger không cập nhật trạng thái phòng.');
    //         }
    //     } catch (\Exception $e) {
    //         // Xử lý lỗi nếu có, quay về trang index với thông báo lỗi
    //         return redirect()->route('phieuthue.index')->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
    //     }
    // }
    public function store(Request $request)
    {
        $request->validate([
            'MaPT' => 'required|string|unique:PHIEUTHUE,MaPT|max:10',
            'MaPhong' => 'required|string|exists:PHONG,MaPhong',
            'MaKH' => 'required|string|exists:KHACHHANG,MaKH',
            'NgayThue' => 'required|date',
            'NgayTra' => 'required|date|after_or_equal:NgayThue',
        ]);

        DB::beginTransaction();

        try {
            // Lấy giá mỗi ngày từ LOAIPHONG qua PHONG
            $giaMotNgay = DB::table('PHONG')
                ->join('LOAIPHONG', 'PHONG.MaLP', '=', 'LOAIPHONG.MaLP')
                ->where('PHONG.MaPhong', $request->MaPhong)
                ->value('LOAIPHONG.DonGia');

            if (!$giaMotNgay) {
                return redirect()->route('phieuthue.create')->with('error', 'Không tìm thấy giá phòng.');
            }

            // Tạo phiếu thuê mới
            $requestData = $request->all();
            $requestData['GiaMotNgay'] = $giaMotNgay;
            PhieuThue::create($requestData);

            DB::commit();

            return redirect()->route('phieuthue.index')->with('success', 'Phiếu thuê đã được thêm thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('phieuthue.create')->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }



    public function show($id)
    {
        $phieuthue = PhieuThue::with(['phong', 'khachHang', 'nhanVien'])->findOrFail($id);
        return view('phieuthue.show', compact('phieuthue'));
    }

    public function edit($id)
    {
        $phieuthue = PhieuThue::findOrFail($id);
        $phongs = Phong::where('TinhTrang', 'Còn trống')->orWhere('MaPhong', $phieuthue->MaPhong)->get();
        $khachhangs = KhachHang::all();
        $nhanviens = NhanVien::all();
        return view('phieuthue.edit', compact('phieuthue', 'phongs', 'khachhangs', 'nhanviens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NgayThue' => 'required|date',
            'NgayTra' => 'required|date|after_or_equal:NgayThue',
            'MaKH' => 'required|string',
            'MaPhong' => 'required|string',
        ]);

        $phieuthue = PhieuThue::findOrFail($id);
        $phieuthue->update($request->all());

        // Lấy lại dữ liệu hoá đơn để đảm bảo trigger đã cập nhật
        $hoadon = DB::table('HOADONTHANHTOAN')->where('MaPT', $phieuthue->MaPT)->first();

        return redirect()->route('phieuthue.index')
                        ->with('success', 'Phiếu thuê đã cập nhật thành công.')
                        ->with('hoadon', $hoadon);
    }
    public function getGiaMotNgay(Request $request)
    {
        $phong = Phong::where('MaPhong', $request->MaPhong)->first();

        if ($phong) {
            return response()->json([
                'GiaMotNgay' => $phong->GiaMotNgay
            ], 200);
        }

        return response()->json([
            'error' => 'Phòng không tồn tại hoặc không có giá.'
        ], 404);
    }
    


    public function destroy($id)
    {
        try {
            // Tìm phiếu thuê cần xóa
            $phieuThue = PhieuThue::findOrFail($id);

            // Xóa phiếu thuê
            $phieuThue->delete();

            // Kiểm tra trạng thái phòng sau khi trigger chạy
            $phong = Phong::where('MaPhong', $phieuThue->MaPhong)->first();

            if ($phong && $phong->TinhTrang === 'Còn Trống') {
                // Trigger đã hoạt động, quay lại trang index với thông báo thành công
                return redirect()->route('phieuthue.index')->with('success', 'Phiếu thuê đã được hủy thành công và trigger đã cập nhật trạng thái phòng.');
            } else {
                // Trigger không hoạt động như mong đợi
                return redirect()->route('phieuthue.index')->with('error', 'Phiếu thuê đã được hủy nhưng trạng thái phòng chưa được cập nhật.');
            }
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return redirect()->route('phieuthue.index')->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}

