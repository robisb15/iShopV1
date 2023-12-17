 <?php

use App\Http\Controllers\{

        DashboardController,
 
         LaporanController};
use App\Http\Controllers\admin\{
        CategoriesController,
        ProductController,
        RekeningController,
        TransaksiController,
        PelangganController,
        PengaturanController};

use Illuminate\Support\Facades\Route;
 
 Route::prefix('admin')->middleware(['auth','admin'])->group(function(){    
        Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
    
    Route::get('/categories',[CategoriesController::class,'index'])->name('admin.categories');
    Route::get('/categories/tambah',[CategoriesController::class,'tambah'])->name('admin.categories.tambah');
    Route::post('/categories/store',[CategoriesController::class,'store'])->name('admin.categories.store');
    Route::post('/categories/update/{id}',[CategoriesController::class,'update'])->name('admin.categories.update');
    Route::get('/categories/edit/{id}',[CategoriesController::class,'edit'])->name('admin.categories.edit');
    Route::get('/categories/delete/{id}',[CategoriesController::class,'delete'])->name('admin.categories.delete');

    Route::get('/product',[ProductController::class,'index'])->name('admin.product');
    Route::get('/product/tambah',[ProductController::class,'tambah'])->name('admin.product.tambah');
    Route::post('/product/store',[ProductController::class,'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
    Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('admin.product.delete');
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('admin.product.update');
    
    Route::get('/transaksi',[TransaksiController::class,'index'])->name('admin.transaksi');
    Route::get('/transaksi/perludicek',[TransaksiController::class,'perludicek'])->name('admin.transaksi.perludicek');
    Route::get('/transaksi/perludikirim',[TransaksiController::class,'perludikirim'])->name('admin.transaksi.perludikirim');
    Route::get('/transaksi/dikirim',[TransaksiController::class,'dikirim'])->name('admin.transaksi.dikirim');
    Route::get('/transaksi/detail/{id}',[TransaksiController::class,'detail'])->name('admin.transaksi.detail');
    Route::get('/transaksi/konfirmasi/{id}',[TransaksiController::class,'konfirmasi'])->name('admin.transaksi.konfirmasi');
    Route::post('/transaksi/inputresi/{id}',[TransaksiController::class,'inputresi'])->name('admin.transaksi.inputresi');
    Route::get('/transaksi/selesai',[TransaksiController::class,'selesai'])->name('admin.transaksi.selesai');
    Route::get('/transaksi/dibatalkan',[TransaksiController::class,'dibatalkan'])->name('admin.transaksi.dibatalkan');

    Route::get('/rekening',[RekeningController::class,'index'])->name('admin.rekening');
    Route::get('/rekening/edit/{id}',[RekeningController::class,'edit'])->name('admin.rekening.edit');
    Route::get('/rekening/tambah',[RekeningController::class,'tambah'])->name('admin.rekening.tambah');
    Route::post('/rekening/store',[RekeningController::class,'store'])->name('admin.rekening.store');
    Route::get('/rekening/delete/{id}',[RekeningController::class,'delete'])->name('admin.rekening.delete');
    Route::post('/rekening/update/{id}',[RekeningController::class,'update'])->name('admin.rekening.update');

    Route::get('/pelanggan',[PelangganController::class,'index'])->name('admin.pelanggan');
    Route::get('/laporan/barang',[LaporanController::class,'barang'])->name('laporan.barang');
    Route::get('/laporan/barang/cetak',[LaporanController::class,'cetakBarang'])->name('laporan.barang.cetak');
    Route::get('/laporan/penjualan',[LaporanController::class,'penjualan'])->name('laporan.penjualan');
    Route::get('/laporan/penjualan/cetak',[LaporanController::class,'cetakPenjualan'])->name('laporan.penjualan.cetak');

});