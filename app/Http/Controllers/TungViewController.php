<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TungViewController extends Controller
{
    public function index()
    {
        $phongsConTrong = DB::select('SELECT * FROM V_PhongConTrong');
        return view('phong.controng', compact('phongsConTrong'));
    }
}
