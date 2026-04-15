<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController2;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminProductController;


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



require __DIR__.'/auth.php';
