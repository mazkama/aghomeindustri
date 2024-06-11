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

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:Admin,Gudang'])->group(function () {
        Route::get('kelola-produk', [ProdukController::class, 'kelola'])->name('produk.view');
        
        Route::get('tambah-produk', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('produk', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::put('produk/edit/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::post('produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.delete');

        // Rute khusus Admin
        Route::middleware('role:Admin')->group(function () {
            //Route Kelola Transaksi
            Route::get('kelola-transaksi', [KelolaTransaksiController::class, 'index'])->name('kelolaTransaksi.view');
            Route::get('/kelola-transaksi/edit/{id}', [KelolaTransaksiController::class, 'edit'])->name('kelolaTransaksi.edit');
            Route::put('/kelola-transaksi/update/{id}', [KelolaTransaksiController::class, 'update'])->name('kelolaTransaksi.update');
            Route::post('/kelola-transaksi/{id}/update-status', [KelolaTransaksiController::class, 'updateStatus'])->name('kelolaTransaksi.updateStatus');
            Route::post('/kelola-transaksi/{id_transaksi}', [KelolaTransaksiController::class, 'destroy'])->name('kelolaTransaksi.delete');

            //Route Metode Pembayaran
            Route::get('kelola-metode-pembayaran', [MetodePembayaranController::class, 'index']);
            Route::get('tambah-metode-pembayaran', [MetodePembayaranController::class, 'create']);
            Route::post('metode-pembayaran', [MetodePembayaranController::class, 'store'])->name('tambah-mp');
            Route::get('metode-pembayaran/edit/{id}', [MetodePembayaranController::class, 'edit'])->name('edit-mp');
            Route::put('metode-pembayaran/edit/{id}', [MetodePembayaranController::class, 'update'])->name('update-mp');
            Route::post('metode-pembayaran/delete/{id}', [MetodePembayaranController::class, 'destroy'])->name('hapus-mp');

            //Route Laporan
            Route::get('laporan', [LaporanController::class, 'index']);
            Route::get('/laporan/filter', [LaporanController::class, 'filter'])->name('laporan.filter');

            //Route Kelola User
            Route::get('kelola-user', [KelolaUserController::class, 'index'])->name('kelola.user.view');
            Route::get('tambah-user', [KelolaUserController::class, 'create'])->name('kelola.user.create');
            Route::post('user', [KelolaUserController::class, 'store'])->name('kelola.user.store');
            Route::post('kelola-user/delete/{id}', [KelolaUserController::class, 'destroy'])->name('kelola.user.delete');
        });

        // Route Pengaturan Admin dan Gudang
        Route::get('admin/profile', [PengaturanController::class, 'showadmin'])->name('admin.profile');
        Route::put('admin/update-profile', [PengaturanController::class, 'updateProfile'])->name('admin.update-profile');
        Route::put('admin/update-password', [PengaturanController::class, 'updatePassword'])->name('admin.update-password');
    });
});
