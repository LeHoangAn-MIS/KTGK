<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\SanPham;

class AdminController extends Controller
{
    function admin() {
        $data = DB::table('san_pham')->where('status', 1)->get();
        return view("admin.index", compact("data"));
    }

    function xoa($id) {
        DB::table('san_pham')->where('id', $id)->update(['status' => 0]);
        return redirect('/admin/sanpham');
    }

    public function them() {
        return view('admin.them-san-pham');
    }

    public function luu(Request $request) {
        $request->validate([
            'ten_san_pham'    => 'required',
            'ten_khoa_hoc'    => 'required',
            'ten_thong_thuong'=> 'required',
            'do_kho'          => 'required',
            'yeu_cau_anh_sang'=> 'required',
            'nhu_cau_nuoc'    => 'required',
            'gia_ban'         => 'required|numeric',
            'hinh_anh'        => 'required|image',
        ], [
            'ten_san_pham.required'     => 'Vui lòng nhập tên sản phẩm',
            'ten_khoa_hoc.required'     => 'Vui lòng nhập tên khoa học',
            'ten_thong_thuong.required' => 'Vui lòng nhập tên thông thường',
            'do_kho.required'           => 'Vui lòng nhập độ khó',
            'yeu_cau_anh_sang.required' => 'Vui lòng nhập yêu cầu ánh sáng',
            'nhu_cau_nuoc.required'     => 'Vui lòng nhập nhu cầu nước',
            'gia_ban.required'          => 'Vui lòng nhập giá bán',
            'gia_ban.numeric'           => 'Giá bán phải là số',
            'hinh_anh.required'         => 'Vui lòng chọn ảnh',
            'hinh_anh.image'            => 'File phải là hình ảnh',
        ]);

        $data = $request->all();
        $data['code'] = 'SP' . time();

        if ($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/image', $filename);
            $data['hinh_anh'] = $filename;
        }

        SanPham::create($data);

        return redirect('admin/sanpham')->with('success', 'Thêm sản phẩm thành công!');
    }
}
