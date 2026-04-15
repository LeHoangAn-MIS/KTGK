<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(){
        return view("caycanh.index");
    }

    public function caycanh(){
        $data = DB::table('san_pham')->limit(20)->get();
        return view("caycanh.index", compact("data"));
    }

    function theloai($id){
        $data = DB::select("
            SELECT san_pham.* 
            FROM san_pham 
            JOIN sanpham_danhmuc ON san_pham.id = sanpham_danhmuc.id_san_pham
            WHERE sanpham_danhmuc.id_danh_muc = ?
        ", [$id]);
        return view("caycanh.index", compact("data"));
    }

    function loc() {
        $sapxep = request('sapxep');
        $filter = request('filter');

        $query = DB::table('san_pham');

        if ($filter == 'de-cham-soc') {
            $query->where('do_kho', 'Dễ chăm sóc');
        }
        if ($filter == 'chiu-duoc-bong-ram') {
            $query->where('yeu_cau_anh_sang', 'like', '%râm%');
        }
        if ($sapxep == 'gia-tang-dan') {
            $query->orderBy('gia_ban', 'ASC');
        } elseif ($sapxep == 'gia-giam-dan') {
            $query->orderBy('gia_ban', 'DESC');
        }

        $data = $query->get();
        return view("caycanh.index", compact("data"));
    }
}
