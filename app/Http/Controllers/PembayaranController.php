<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;
use App\Models\Pembayaran; 

class PembayaranController extends Controller
{
    public function create($id_transaksi)
    {
        $user = Auth::user();
        $transaksi = Transaksi::where('id_transaksi', $id_transaksi)->where('id_user', $user->id_user)->first();

        if (!$transaksi) {
            return redirect('/pemesanan')->with('error', 'Transaksi tidak ditemukan.');
        }

        return view('pages.customer.pemesanan.pembayaran', [
            'transaksi' => $transaksi,
        ]);
    }

    public function store(Request $request, $id_transaksi)
    {
        $user = Auth::user();

        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'rekening' => 'required|string',
            'tanggal_pembayaran' => 'required|date',
        ]);

        // Cek transaksi
        $transaksi = Transaksi::where('id_transaksi', $id_transaksi)->where('id_user', $user->id_user)->first();

        if (!$transaksi) {
            return redirect('/pemesanan')->with('error', 'Transaksi tidak ditemukan.');
        }

        // Simpan data pembayaran
        $pembayaran = new Pembayaran();
        $pembayaran->id_transaksi = $transaksi->id_transaksi;
        $pembayaran->nama_rekening = $request->nama;
        $pembayaran->rekening = $request->rekening;
        $pembayaran->tanggal_pembayaran = $request->tanggal_pembayaran;
        $pembayaran->save();

        // Update status bayar transaksi
        $transaksi->status_bayar = "Waiting Konfirmasi";
        $transaksi->save();

        return redirect('/pemesanan')->with('success', 'Pembayaran berhasil ditambahkan.');
    }
}
