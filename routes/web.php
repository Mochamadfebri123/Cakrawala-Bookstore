<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BookmarkController;

//Home
route::get('/',[HomeController::class,'home']);
Route::get('/dashboard', [HomeController::class,'dashboard'] )->middleware(['auth', 'verified'])->name('dashboard');
route::get('deskripsi/{id}',[HomeController::class,'deskripsi']);
route::get('cari_produkuser', [HomeController::class, 'cari_produkuser']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';


//Cart
route::get('tambah_keranjang/{id}',[CartController::class,'tambah_keranjang'])->middleware(['auth', 'verified']);
route::get('singleAddToCart',[CartController::class,'singleAddToCart'])->middleware(['auth', 'verified']);
route::post('singleAddToCart',[CartController::class,'singleAddToCart'])->middleware(['auth', 'verified']);
route::get('keranjang',[CartController::class,'keranjang'])->middleware(['auth', 'verified']);
route::post('update-to-cart',[CartController::class,'update_cart'])->middleware(['auth', 'verified']);
Route::get('hapus_keranjang/{id}',[CartController::class,'hapus_keranjang'])->middleware(['auth','verified']);

//Order
route::post('order',[OrderController::class,'order'])->middleware(['auth', 'verified']);
route::get('checkout',[OrderController::class,'checkout'])->middleware(['auth', 'verified']);
route::get('orderuser',[OrderController::class,'orderuser'])->middleware(['auth', 'verified']);
route::get('detail/{id}',[OrderController::class,'detail'])->middleware(['auth', 'verified']);


//Bookmark
route::get('bookmark',[BookmarkController::class,'lihat_bookmark'])->middleware(['auth', 'verified']);
route::get('bookmark/{id}',[BookmarkController::class,'bookmark'])->middleware(['auth', 'verified']);
Route::get('hapus_bookmark/{id}',[BookmarkController::class,'hapus_bookmark'])->middleware(['auth','verified']);


//Admin
route::get('admin/dashboard', [AdminController::class, 'index'])->middleware(['auth','admin']);
route::get('kategori', [AdminController::class, 'kategori'])->middleware(['auth','admin']);
route::get('edit_kategori/{id}', [AdminController::class, 'edit_kategori'])->middleware(['auth','admin']);
route::post('update_kategori/{id}', [AdminController::class, 'update_kategori'])->middleware(['auth','admin']);
route::get('tambah_kategori', [AdminController::class, 'tambah_kategori'])->middleware(['auth','admin']);  
route::post('prosestambah_kategori', [AdminController::class, 'prosestambah_kategori'])->middleware(['auth','admin']);
route::get('hapus_kategori/{id}', [AdminController::class,'hapus_kategori'])->middleware(['auth','admin']);
route::get('tambah_produk', [AdminController::class,'tambah_produk'])->middleware(['auth','admin']);
route::post('prosestambah_produk', [AdminController::class, 'prosestambah_produk'])->middleware(['auth','admin']);
route::get('produk', [AdminController::class, 'produk'])->middleware(['auth','admin']);
route::get('edit_produk/{id}', [AdminController::class, 'edit_produk'])->middleware(['auth','admin']);
route::post('update_produk/{id}', [AdminController::class, 'update_produk'])->middleware(['auth','admin']);
route::get('hapus_produk/{id}', [AdminController::class,'hapus_produk'])->middleware(['auth','admin']);
route::get('cari_produk', [AdminController::class, 'cari_produk'])->middleware(['auth','admin']);
route::get('order', [AdminController::class, 'order'])->middleware(['auth','admin']);
route::get('lihat/{id}', [AdminController::class, 'lihat'])->middleware(['auth','admin']);
route::get('order/new', [AdminController::class, 'order_new'])->middleware(['auth','admin']);
route::get('order/process', [AdminController::class, 'order_process'])->middleware(['auth','admin']);
route::get('order/delivered', [AdminController::class, 'order_delivered'])->middleware(['auth','admin']);
route::get('edit/{id}', [AdminController::class, 'edit_order'])->middleware(['auth','admin']);
route::post('update_order/{id}', [AdminController::class, 'update_order'])->middleware(['auth','admin']);
route::get('hapus_order/{id}', [AdminController::class,'hapus_order'])->middleware(['auth','admin']);