<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class LaporanController extends Controller
{
    public function index()
    {
        $dataTransaksi = Transaksi::with('user')->get();

        return view('pages.laporan.view', [
            'dataTransaksi' => $dataTransaksi,
            'jumlah_barang' => $dataTransaksi->count(),
        ]);
    }

    public function filter(Request $request)
    {
        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;
        $status = $request->status;

        $dataTransaksi = Transaksi::query();

        if ($tanggalAwal && $tanggalAkhir) {
            $dataTransaksi->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]);
        }

        if ($status) {
            $dataTransaksi->where('status_bayar', $status);
        }

        $dataTransaksi = $dataTransaksi->get();

        return view('pages.laporan.view', compact('dataTransaksi'));
    }
}
