<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class SanPhamController extends Controller
{
    public function search(Request $request)
{
    $keyword = $request->keyword;

    $products = SanPham::where('ten_san_pham', 'like', '%' . $keyword . '%')
        ->where('status', 1)
        ->get();

    return view('caycanh.index', compact('products', 'keyword'));
}
    
}
