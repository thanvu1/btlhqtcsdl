<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TungProc1Controller extends Controller
{
    public function thongKePhongTheoLoaiGiuong()
    {
        $results = DB::select('EXEC ThongKePhongTheoLoaiGiuong');
        return view('phong.tungproc1', compact('results'));
    }
}
