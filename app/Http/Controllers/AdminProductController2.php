<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductController2 extends Controller
{
    // 1. Hiện form
    public function create() {
        return view('admin.products.create');
    }

    // 2. Xử lý lưu
    public function store(Request $request) {
        // Xử lý file ảnh (Lưu vào storage/app/public/image)
        $imageName = null;
        if ($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh');
            $imageName = $file->getClientOriginalName();
            $file->storeAs('public/image', $imageName);
        }

        // Chèn dữ liệu vào bảng san_pham
        DB::table('san_pham')->insert([
            'ten_san_pham'      => $request->ten_san_pham,
            'ten_khoa_hoc'      => $request->ten_khoa_hoc,
            'ten_thong_thuong'  => $request->ten_thong_thuong,
            'mo_ta'             => $request->mo_ta,
            'do_kho'            => $request->do_kho,
            'yeu_cau_anh_sang'  => $request->yeu_cau_anh_sang,
            'nhu_cau_nuoc'      => $request->nhu_cau_nuoc,
            'gia_ban'           => $request->gia_ban,
            'hinh_anh'          => $imageName,
            'status'            => 1, // Mặc định là 1 để hiện lên danh sách
            'created_at'        => now(),
        ]);

        // Lưu xong thì quay lại trang danh sách (hoặc trang chủ cho nhanh nếu chưa làm câu 7)
        return redirect()->route('home')->with('success', 'Thêm cây cảnh thành công!');
    }
}