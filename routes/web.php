<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController2;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminProductController;

use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index']);


Route::get('/dashboard', function () {
    //return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Câu 3:
Route::get('/caycanh/{id}', [HomeController2::class, 'show'])->name('product.show');

//câu 4
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add'); //câu 3
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


Route::get('/caycanh', [HomeController::class, 'caycanh']);
Route::get('/caycanh/theloai/{id}', [HomeController::class, 'theloai']);
Route::get('/caycanh/loc', [HomeController::class, 'loc']);

require __DIR__.'/auth.php';

Route::get('/admin/sanpham', [AdminController::class, 'admin']);
Route::get('/admin/sanpham/xoa/{id}', [AdminController::class, 'xoa']);
Route::get('admin/sanpham/them', [AdminController::class, 'them']);
Route::post('admin/sanpham/them', [AdminController::class, 'luu']);