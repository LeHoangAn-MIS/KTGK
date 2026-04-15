<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index']);


Route::get('/dashboard', function () {
    //return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/caycanh', [HomeController::class, 'caycanh']);
Route::get('/caycanh/theloai/{id}', [HomeController::class, 'theloai']);
Route::get('/caycanh/loc', [HomeController::class, 'loc']);

require __DIR__.'/auth.php';

Route::get('/admin/sanpham', [AdminController::class, 'admin']);
Route::get('/admin/sanpham/xoa/{id}', [AdminController::class, 'xoa']);
Route::get('admin/sanpham/them', [AdminController::class, 'them']);
Route::post('admin/sanpham/them', [AdminController::class, 'luu']);