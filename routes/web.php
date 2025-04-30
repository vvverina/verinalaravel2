<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/produk/create',
    [ProdukController::class,
    'create'])->name('produk.create');
Route::post('/produk',
    [ProdukController::class, 
    'store'])->name('produk.store');