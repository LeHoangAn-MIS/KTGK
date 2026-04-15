<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController2 extends Controller
{
    public function show($id) {
    // Lấy thông tin cây cảnh theo ID từ bảng san_pham trong database [cite: 3]
        $product = DB::table('san_pham')->where('id', $id)->first();

        if (!$product) {
            abort(404);
        }

        return view('chi-tiet', compact('product'));
    }
}