<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\TransaksiController;

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


//Route Beranda
Route::get('/', function () {
    return view('login');
});   

Route::get('/tentang', function () {
    return view('tentang');
});    

Route::get('login', [SessionController::class, 'loginclass']);
Route::post('loginsukses', [SessionController::class, 'login']);
Route::get('register', [SessionController::class, 'register']);
Route::post('create', [SessionController::class, 'create']);
Route::post('logout', [SessionController::class, 'logout'])->name('logout');

//Route Customer
Route::get('beranda', [CustomerController::class, 'landing']);

//Route Login/Register
Route::get('register', [SessionController::class, 'register']);

//Route Produk
Route::get('kelola-produk', [ProdukController::class, 'kelola'])->name('produk.view');
Route::get('detail-produk/{id}', [ProdukController::class, 'detail'])->name('produk.detail');
Route::get('tambah-produk', [ProdukController::class, 'create'])->name('produk.create');
Route::post('produk', [ProdukController::class, 'store'])->name('produk.store');
Route::get('produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('produk/edit/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::post('produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.delete'); 
Route::get('/belanja', [ProdukController::class, 'katalog'])->name('produk.belanja');

//Route Keranjang
Route::get('keranjang', [KeranjangController::class, 'index'])->name('keranjang');
Route::post('keranjang/add', [KeranjangController::class, 'store'])->name('keranjang.store');
Route::post('keranjang/delete/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.delete');
Route::put('keranjang/update/{id_dt_tr}', [KeranjangController::class, 'update'])->name('keranjang.update');

//Route Pemesanan
Route::get('pemesanan', [TransaksiController::class, 'index'])->name('transaksi.view'); 
Route::get('pemesanan/add', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::get('pemesanan/{id_transaksi}', [TransaksiController::class, 'detail'])->name('transaksi.detail'); 
Route::post('pemesanan/add/insert', [TransaksiController::class, 'store'])->name('transaksi.store');