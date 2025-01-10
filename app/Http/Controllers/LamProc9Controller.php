<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LamProc9Controller extends Controller
{
    public function  getDanhSachKhachHang()
    {
        $khachHang = DB::select('EXEC GetDanhSachKhachHangDaSuDungDichVu');
        return view('dichvu.lamproc9', compact('khachHang'));
    }
}
