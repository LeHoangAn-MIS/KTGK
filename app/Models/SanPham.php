<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'san_pham'; // hoặc tên bảng thực tế của bạn

    public $timestamps = false;

    protected $fillable = [
        'code', 'ten_san_pham', 'ten_khoa_hoc', 'ten_thong_thuong',
        'mo_ta', 'do_kho', 'yeu_cau_anh_sang', 'nhu_cau_nuoc',
        'gia_ban', 'hinh_anh'
    ];
}