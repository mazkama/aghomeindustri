<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodePembayaran;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        $data = MetodePembayaran::all();
        return view('pages.mtdPembayaran.view', ['dataMtd' => $data]);
    }

    public function create()
    {
        return view('pages.mtdPembayaran.create');
    }

    public function store(Request $request)
    {
        $data = new MetodePembayaran();
        $data->nama_mtd_pembayaran = $request->nama_mp;
        $data->no_rek_mtd_pembayaran = $request->no_va;
        $data->atas_nama_mtd_pembayaran = $request->nama_va;

        $data->save();
        return redirect('/kelola-metode-pembayaran')->with('success', 'Data berhasil disimpan!');
    }

    public function edit($idMetode)
    {
        $data = MetodePembayaran::find($idMetode);
        return view('pages.mtdPembayaran.edit', compact('data'));
    }

    public function update(Request $request, $idMetode)
    {
        $data = MetodePembayaran::find($idMetode);
        $data->nama_mtd_pembayaran = $request->nama_mp;
        $data->no_rek_mtd_pembayaran = $request->no_va;
        $data->atas_nama_mtd_pembayaran = $request->nama_va;

        $data->update();
        return redirect('/kelola-metode-pembayaran')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($idMetode)
    {
        $data = MetodePembayaran::find($idMetode);

        $data->delete();
        return redirect('/kelola-metode-pembayaran')->with('success', 'Data berhasil dihapus!');
    }
}
