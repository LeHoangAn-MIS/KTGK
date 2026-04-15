<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController2 extends Controller
{
    //
    public function index(){

        return view('caycanh.index',);
    }

    public function show($id) {
        $product = DB::table('san_pham')->where('id', $id)->first();

        if (!$product) {
            abort(404);
        }

        return view('chi-tiet', compact('product'));
    }

}