<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);


Route::get('/dashboard', function () {
    //return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/timkiem', ['App\Http\Controllers\SanPhamController', 'search'])->name('search');
Route::get('/product/create', [App\Http\Controllers\SanPhamController::class, 'create'])->name('product.create');
Route::post('/product/store', [App\Http\Controllers\SanPhamController::class, 'store'])->name('product.store');

require __DIR__.'/auth.php';
