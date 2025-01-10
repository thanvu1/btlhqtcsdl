<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LamView10Controller extends Controller
{
    public function index()
    {
        $doanhthu = DB::select('SELECT * FROM DoanhThuDichVu');
        return view('dichvu.lamview10', compact('doanhthu'));
    }
}