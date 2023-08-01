<?php

namespace App\Http\Controllers;


use App\Models\sanpham;
use Illuminate\Http\Request;

class sanphamController extends Controller
{
    public function productList()
    {
        $sanphams = sanpham::all();

        return view('sanphams', compact('sanphams'));
    }
}
