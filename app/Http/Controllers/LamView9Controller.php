<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LamView9Controller extends Controller
{
    public function index()
    {
        $dsnhanvien = DB::select('SELECT * FROM DanhSachNhanVienVaBoPhan');
        return view('nhanvien.lamview9', compact('dsnhanvien'));
    }
}