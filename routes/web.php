<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/produk',
    [ProdukController::class, 
    'index'])->name('produk.index');
Route::get('/produk/create',
    [ProdukController::class,
    'create'])->name('produk.create');
Route::post('/produk/store',
    [ProdukController::class, 
    'store'])->name('produk.store');
Route::get('/produk/{produk}/edit', 
    [ProdukController::class, 
    'edit'])->name('produk.edit');
Route::resource('produk', ProdukController::class);

// Route::get('/produk');