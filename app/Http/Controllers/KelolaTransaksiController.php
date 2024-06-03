<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\dtTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class KelolaTransaksiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Mengambil data dtTransaksi beserta data Produk terkait
        $data = Transaksi::where('id_user', $user->id_user)->get();

        return view('pages.transaksi.view', [
            'dataTransaksi' => $data,
            'jumlah_barang' => $data->count(), 
        ]);
    }
}
