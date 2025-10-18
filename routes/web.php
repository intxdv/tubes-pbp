<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GadgetController;



Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/', [ProductController::class, 'index'])->name('products.index');

Route::resource('products', ProductController::class);

Route::resource('gadgets', GadgetController::class);
