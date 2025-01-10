<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TungView1Controller extends Controller
{
    public function index()
    {
        $phongsConTrong = DB::select('SELECT * FROM V_PhongConTrong');
        return view('phong.tungview1', compact('phongsConTrong'));
    }
}
