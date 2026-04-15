<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);


Route::get('/dashboard', function () {
    //return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/timkiem', ['App\Http\Controllers\SanPhamController', 'search'])->name('search');

Route::get('/sanpham/{id}', [SanPhamController::class, 'detail'])->name('sanpham.detail');

require __DIR__.'/auth.php';


