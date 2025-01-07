<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TungFunctionController extends Controller
{
    public function index()
    {
        
        // Truy vấn và sử dụng hàm SQL để tính tổng số ngày và tổng tiền
        $hoadon = DB::table('PHIEUTHUE')
            ->select(
                'MaPT',
                'MaPhong',
                DB::raw('dbo.TinhSoNgayThuePhong(NgayThue, NgayTra) AS SoNgayThue'),
                DB::raw('dbo.TinhTienThuePhong(NgayThue, NgayTra, GiaMotNgay) AS TongTienThue')
            )
            ->get();

        return view('hoadonthanhtoan.tungfunction', compact('hoadon'));
        
    }
}
