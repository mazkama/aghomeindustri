<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class LaporanController extends Controller
{
    public function index()
    {
        $data = Transaksi::with('user')->get();

        return view('pages.laporan.view', [
            'dataTransaksi' => $data,
            'jumlah_barang' => $data->count(),
        ]);
    }

    // Di dalam LaporanController
    public function filter(Request $request)
    {
        $tanggal = $request->tanggal;
        $status = $request->status;

        $dataTransaksi = Transaksi::query();

        if ($tanggal) {
            $dataTransaksi->whereDate('created_at', $tanggal);
        }

        if ($status) {
            $dataTransaksi->where('status_bayar', $status);
        }

        $dataTransaksi = $dataTransaksi->get();

        return view('pages.laporan.view', compact('dataTransaksi'));
    }

}
