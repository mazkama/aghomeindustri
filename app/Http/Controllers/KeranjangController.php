<?php

namespace App\Http\Controllers;

use App\Models\Produk; 
use Illuminate\Support\Facades\Auth;
use App\Models\dtTransaksi;

use Illuminate\Http\Request;


class KeranjangController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        // Mengambil data dtTransaksi beserta data Produk terkait
        $data = dtTransaksi::with('produk')
                    ->where('id_user', $user->id_user)
                    ->whereNull('id_transaksi')
                    ->get();

        return view('pages.customer.keranjang', [
            'dataKeranjang' => $data,
            'jumlah_barang' => $data->count(), // Menghitung jumlah barang dalam koleksi $data
        ]);
        
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $produk = Produk::find($request->kode_produk);
        $subTotal = $produk->harga * $request->jumlah_produk;

        // Periksa apakah kode_produk sudah ada dalam tabel dtTransaksi untuk pengguna saat ini
        $existingData = dtTransaksi::where('id_user', $user->id_user)
            ->where('kode_produk', $request->kode_produk)
            ->whereNULL('id_transaksi')
            ->first();

        // Jika sudah ada data untuk kode_produk yang sama, tambahkan jumlah_produk baru
        if ($existingData) {
            $existingData->jumlah_produk += $request->jumlah_produk;
            $existingData->harga += $subTotal;
            $existingData->save();
        } else {
            // Jika belum ada data, buat entri baru
            $data = new dtTransaksi();
            $data->id_user = $user->id_user;
            $data->kode_produk = $request->kode_produk;
            $data->jumlah_produk = $request->jumlah_produk;
            $data->harga = $subTotal;
            $data->save();
        }

        return redirect()->back()->with('success', 'Data berhasil ditambah.');
    }

    public function update(Request $request, $id_dt_tr)
    {
        $data = dtTransaksi::find($id_dt_tr);

        // Mengambil data produk terkait
        $produk = Produk::find($data->kode_produk);

        if ($request->action === 'minus') {
            if ($data->jumlah_produk > 1) {
                $data->jumlah_produk -= 1;
                $data->harga = $produk->harga * $data->jumlah_produk;
                $data->save();
            } else {
                // Jika jumlah produk kurang dari 1, maka hapus dari keranjang
                $data->delete();
            }
        } elseif ($request->action === 'plus') {
            $data->jumlah_produk += 1;
            $data->harga = $produk->harga * $data->jumlah_produk;
            $data->save();
        }

        return redirect()->back()->with('success', 'Jumlah produk berhasil diperbarui');
    }


    public function destroy($id_dt_tr)
    {
        $data = dtTransaksi::find($id_dt_tr);

        $data->delete();


        return redirect()->back()->with('success', 'data berhasil dihapus.');
    }
}
