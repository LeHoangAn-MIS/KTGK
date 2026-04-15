<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'san_pham';

    protected $fillable = ['ten_san_pham', 'status', 'hinh_anh', 'gia'];
}
