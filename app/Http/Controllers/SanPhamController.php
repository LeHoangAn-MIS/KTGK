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
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
{
    $product = new SanPham();

    $product->ten_san_pham = $request->ten_san_pham;
    $product->ten_khoa_hoc = $request->ten_khoa_hoc;
    $product->ten_thong_thuong = $request->ten_thong_thuong;
    $product->mo_ta = $request->mo_ta;
    $product->do_kho = $request->do_kho;
    $product->anh_sang = $request->anh_sang;
    $product->nuoc = $request->nuoc;
    $product->gia = $request->gia;

    // upload ảnh
    if ($request->hasFile('hinh_anh')) {
        $file = $request->file('hinh_anh');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/image', $filename);
        $product->hinh_anh = $filename;
    }

    $product->status = 1;

    $product->save();

    return redirect('/')->with('success', 'Thêm thành công');
}

}
