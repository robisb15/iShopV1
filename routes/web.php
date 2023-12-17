<?php

use App\Http\Controllers\{
        ProfileController,
         KategoriController, 
};

use App\Http\Controllers\user\{

    ProdukController,
    WelcomeController};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[WelcomeController::class,'index'])->name('home');
Route::get('/home',[WelcomeController::class,'index'])->name('home2');
Route::get('/produk',[ProdukController::class,'index'])->name('user.produk');
Route::get('/produk/cari',[ProdukController::class,'cari'])->name('user.produk.cari');
Route::get('/kategori/{id}',[KategoriController::class,'produkByKategori'])->name('user.kategori');
Route::get('/produk/{id}',[ProdukController::class,'detail'])->name('user.produk.detail');

Route::get('/dashboard', function () {
    if(Auth::user()->role == 'admin'){
        return redirect('admin');
    } 
    else if(Auth::user()->role == 'customer'){
       return redirect('/'); 
    }   
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/customer.php';
