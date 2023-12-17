<?php


use App\Http\Controllers\user\{
    AlamatController,
    CheckoutController,
    KeranjangController,
    OrderController,

    WelcomeController};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','customer'])->group(function(){
    Route::get('/akun',[WelcomeController::class,'kontak'])->name('kontak');
    Route::post('/keranjang/simpan',[KeranjangController::class,'simpan'])->name('user.keranjang.simpan');
    Route::get('/keranjang',[KeranjangController::class,'index'])->name('user.keranjang');
    Route::post('/keranjang/update',[KeranjangController::class,'update'])->name('user.keranjang.update');
    Route::get('/keranjang/delete/{id}',[KeranjangController::class,'delete'])->name('user.keranjang.delete');
    Route::get('/alamat',[AlamatController::class,'index'])->name('user.alamat');
   
    Route::post('/alamat/simpan',[AlamatController::class,'simpan'])->name('user.alamat.simpan');
    Route::post('/alamat/update/{id}',[AlamatController::class,'update'])->name('user.alamat.update');
    Route::get('/alamat/ubah/{id}',[AlamatController::class,'ubah'])->name('user.alamat.ubah');
    Route::get('/checkout',[CheckoutController::class,'index'])->name('user.checkout');
    Route::post('/order/simpan',[OrderController::class,'simpan'])->name('user.order.simpan');
    Route::get('/order/sukses',[OrderController::class,'sukses'])->name('user.order.sukses');
    Route::get('/order',[OrderController::class,'index'])->name('user.order');
    Route::get('/order/detail/{id}',[OrderController::class,'detail'])->name('user.order.detail');
    Route::get('/order/pesananditerima/{id}',[OrderController::class,'pesananditerima'])->name('user.order.pesananditerima');
    Route::get('/order/pesanandibatalkan/{id}',[OrderController::class,'pesanandibatalkan'])->name('user.order.pesanandibatalkan');
    Route::get('/order/pembayaran/{id}',[OrderController::class,'pembayaran'])->name('user.order.pembayaran');
    Route::post('/order/kirimbukti/{id}',[OrderController::class,'kirimbukti'])->name('user.order.kirimbukti');
});