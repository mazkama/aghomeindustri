<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\KelolaTransaksiController;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\LaporanController;

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

Route::middleware(['auth', 'role:Customer'])->group(function () {
    //Route Customer
    Route::get('beranda', [CustomerController::class, 'landing']);
    Route::get('customer/profile', [CustomerController::class, 'show'])->name('customer.profile');
    Route::get('customer/profile/password', [CustomerController::class, 'password'])->name('customer.password');
    Route::put('cutomer/update-profile', [CustomerController::class, 'updateProfile'])->name('customer.update-profile');
    Route::put('cutomer/update-password', [CustomerController::class, 'updatePassword'])->name('customer.update-password');

    //Route Keranjang
    Route::get('keranjang', [KeranjangController::class, 'index'])->name('keranjang');
    Route::post('keranjang/add', [KeranjangController::class, 'store'])->name('keranjang.store');
    Route::post('keranjang/delete/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.delete');
    Route::put('keranjang/update/{id_dt_tr}', [KeranjangController::class, 'update'])->name('keranjang.update');
    //Route Customer Produk
    Route::get('/belanja', [ProdukController::class, 'katalog'])->name('produk.belanja');

    //Route Pemesanan
    Route::get('pemesanan', [TransaksiController::class, 'index'])->name('transaksi.view');
    Route::get('pemesanan/add', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::get('pemesanan/detail/{id_transaksi}', [TransaksiController::class, 'detail'])->name('transaksi.detail');
    Route::post('pemesanan/add/insert', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::put('pemesanan/update/{id_transaksi}', [TransaksiController::class, 'update'])->name('transaksi.update');

    Route::get('detail-produk/{id}', [ProdukController::class, 'detail'])->name('produk.detail');

    //Route Pembayaran
    Route::get('/pembayaran/create/{id_transaksi}', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/pembayaran/store/{id_transaksi}', [PembayaranController::class, 'store'])->name('pembayaran.store');
});