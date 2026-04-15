<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function admin() {
        $data = DB::table('san_pham')->where('status', 1)->get();
        return view("admin", compact("data"));
    }

    function xoa($id) {
        DB::table('san_pham')->where('id', $id)->update(['status' => 0]);
        return redirect('/admin/sanpham');
    }

    function xem($id) {
        $data = DB::table('san_pham')->where('id', $id)->first();
        return view("admin", compact("data"));
    }
}
