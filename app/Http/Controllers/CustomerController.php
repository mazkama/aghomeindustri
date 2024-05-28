<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\dtTransaksi;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function landing()
    {
        $user = Auth::user();
        $data = dtTransaksi::with('produk')->where('id_user', $user->id_user)->get();
        return view('home', ['jumlah_barang' => $data->count(),]);
    }
}
