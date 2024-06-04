<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use App\Models\dtTransaksi;
use Illuminate\Support\Facades\Storage;


class ProdukController extends Controller
{
    public function kelola()
    {
        $data = Produk::all();
        return view('pages.produk.view', ['dataProduk' => $data]);
    }

    public function katalog()
    {
        $user = Auth::user();
        $data = Produk::all();
        $dt = dtTransaksi::with('produk')->where('id_user', $user->id_user)->get();
        return view(
            'pages.produk.belanja',
            ['dataProduk' => $data, 'jumlah_barang' => $dt->count(),],
            compact('user')
        );
    }

    public function detail($kodeProduk)
    {
        $user = Auth::user();
        $dt = dtTransaksi::with('produk')->where('id_user', $user->id_user)->get();
        $data = Produk::find($kodeProduk);
        return view('pages.produk.detail',['jumlah_barang' => $dt->count()], compact('data'));
    }

    public function create()
    {
        return view('pages.produk.create');
    }

    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka',
            'digits' => ':attribute harus memiliki :digits digit',
            'regex' => ':attribute tidak boleh mengandung angka',
            'min' => ':attribute harus memiliki minimal :min digit',
        ];

        $this->validate($request, [
            'nama_produk' => 'required|regex:/^[^0-9]+$/|unique:produk',
            'deskripsi_produk' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'ukuran' => 'required', 
        ]);

        $data = new Produk();
        $data->nama_produk = $request->nama_produk;
        $data->deskripsi_produk = $request->deskripsi_produk;
        $data->stok = $request->stok;
        $data->harga = $request->harga;
        $data->ukuran = $request->ukuran;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $data->foto = $filePath;
        }

        $data->save();

        return redirect('/kelola-produk')->with('success', 'Data berhasil disimpan!');
    }

    public function edit($kodeProduk)
    {
        $data = Produk::find($kodeProduk);
        return view('produk.edit', compact('data'));
    }

    public function update(Request $request, $kodeProduk)
    {
        // $this->validate($request, [
        //     'nama_produk' => 'required|regex:/^[^0-9]+$/|unique:produk',
        //     'deskripsi_produk' => 'required',
        //     'stok' => 'required|numeric',
        //     'harga' => 'required|numeric',
        //     'ukuran' => 'required',
        //     'foto' => 'nullable|file|mimes:jpeg,png,mp4|max:2048', // Dua tanda || dan required dihapus
        // ]);

        $data = Produk::find($kodeProduk);
        $data->nama_produk = $request->nama_produk;
        $data->deskripsi_produk = $request->deskripsi_produk;
        $data->stok = $request->stok;
        $data->harga = $request->harga;
        $data->ukuran = $request->ukuran; 

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $data->foto = $filePath;
        }

        $data->update();

        return redirect('/kelola-produk')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($kodeProduk)
    {
        $data = Produk::find($kodeProduk);

        if ($data->foto) {
            Storage::disk('public')->delete($data->foto);
        }

        $data->delete();


        return redirect('/kelola-produk')->with('success', 'Data berhasil dihapus!');
    }
}
