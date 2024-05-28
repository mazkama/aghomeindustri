<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use App\Models\dtTransaksi;
use App\Models\Transaksi;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{

    public function generateIdPemesanan()
    {
        $orderIdLength = 9; // Panjang ID pemesanan

        do {
            // Menghasilkan ID pemesanan angka acak
            $orderId = '';
            for ($i = 0; $i < $orderIdLength; $i++) {
                $orderId .= rand(0, 9);
            }
            // Cek apakah ID sudah ada di database
            $exists = Transaksi::where('id_transaksi', $orderId)->first();
        } while ($exists); // Ulangi sampai mendapatkan ID yang unik

        return $orderId; // Mengembalikan nilai ID pemesanan sebagai variabel langsung
    }


    public function index()
    {
        $user = Auth::user();
        // Mengambil data dtTransaksi beserta data Produk terkait
        $data = Transaksi::where('id_user', $user->id_user)->get();

        return view('pages.customer.pemesanan.view', [
            'dataTransaksi' => $data,
            'jumlah_barang' => $data->count(), // Menghitung jumlah barang dalam koleksi $data
        ]);
    }

    public function create()
    {
        $user = Auth::user();
        // Mengambil data dtTransaksi beserta data Produk terkait
        $dataKeranjang = dtTransaksi::with('produk')
        ->where('id_user', $user->id_user)
        ->whereNULL('id_transaksi')
        ->get();

        $idPemesanan = $this->generateIdPemesanan();

        return view('pages.customer.pemesanan.create', [
            'dataKeranjang' => $dataKeranjang,
            'user' => $user,
            'jumlah_barang' => $dataKeranjang->count(),
            'id_pemesanan' => $idPemesanan, // Menghitung jumlah barang dalam koleksi $data
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // Save the main transaction data
        $data = new Transaksi();
        $data->id_transaksi = $request->id_pesanan;
        $data->id_user = $user->id_user;
        $data->total_bayar = $request->total_pembayaran;
        $data->status_bayar = "Belum Dibayar";
        $data->save();

        // Update id_transaksi for each item in the cart
        dtTransaksi::where('id_user', $user->id_user)
            ->whereNull('id_transaksi')
            ->update(['id_transaksi' => $request->id_pesanan]);

        return redirect('/pemesanan')->with('success', 'Data berhasil ditambah.');
    }


    public function detail($id_transaksi)
    {
        $user = Auth::user();
        $transaksi = Transaksi::where('id_transaksi', $id_transaksi)->where('id_user', $user->id_user)->first();
        
        if (!$transaksi) {
            return redirect('/pemesanan')->with('error', 'Transaksi tidak ditemukan.');
        }

        $dataKeranjang = dtTransaksi::with('produk')->where('id_transaksi', $id_transaksi)->get();

        return view('pages.customer.pemesanan.detail', [
            'transaksi' => $transaksi,
            'user' => $user,
            'dataKeranjang' => $dataKeranjang,
        ]);
    }
}
