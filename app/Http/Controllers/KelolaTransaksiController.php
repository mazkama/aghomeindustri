<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\dtTransaksi;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use App\Models\Produk;
use Illuminate\Http\Request;

class KelolaTransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::with('user')->get();

        return view('pages.transaksi.view', [
            'dataTransaksi' => $data,
            'jumlah_barang' => $data->count(),
        ]);
    }

    public function edit($id_transaksi)
    {
        $transaksi = Transaksi::with(['user'])->findOrFail($id_transaksi);

        $dataKeranjang = dtTransaksi::with('produk')->where('id_transaksi', $id_transaksi)->get();

        $pembayaran = Pembayaran::where('id_transaksi', $id_transaksi)->first();

        return view('pages.transaksi.edit', [
            'transaksi' => $transaksi,
            'dataKeranjang' => $dataKeranjang,
            'pembayaran' => $pembayaran,
        ]);
    }


    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'nomor' => 'required|string|max:20',
        //     'alamat' => 'required|string|max:255',
        //     'biaya_pengiriman' => 'required|numeric',
        //     'status_pembayaran' => 'required|string|max:255',
        // ]);        

        $transaksi = Transaksi::findOrFail($id);

        $data = Transaksi::find($id);
        $data->biaya_pengiriman = $request->biaya_pengiriman;
        $data->status_bayar = $request->status_bayar;
        $data->total_bayar = $request->total_bayar;


        $data->update();

        return redirect()->back()->with('success', 'Transaksi updated successfully.');
    }

    public function updateStatus(Request $request, $id_transaksi)
    {
        $user = Auth::user();
        // Validasi data input
        $request->validate([
            'action' => 'required|string', // Menambahkan validasi untuk aksi (konfirmasi atau hapus)
        ]);
        
        // Cari transaksi
        $transaksi = Transaksi::findOrFail($id_transaksi)->first();
        // Ambil data dari request
        
        $jumlah_produk = \DB::table('detail_tr')->get();
    
        if ($request->action == 'konfirmasi') {
            // Update status bayar transaksi menjadi "Diproses"
            $transaksi->status_bayar = "Diproses";
            foreach ($jumlah_produk as $pesanan){
                $produk = \DB::table('produk')->where('kode_produk', $pesanan->kode_produk)->first()->stok;
                if($produk >= $pesanan->jumlah_produk){
                    $produk = \DB::table('produk')->where('kode_produk', $pesanan->kode_produk)->decrement('stok',$pesanan->jumlah_produk);
                }
            }
            $transaksi->save();
        } elseif ($request->action == 'hapus') {
            // Ubah status bayar transaksi menjadi "Pembayaran Gagal"
            $transaksi->status_bayar = "Pembayaran Gagal";
            $transaksi->save();

            $pembayaran = Pembayaran::where('id_transaksi', $id_transaksi)->first();
            // Hapus id pembayaran yang terkait
            $pembayaran->delete();
        }

        return redirect()->back()->with('success', 'Status transaksi berhasil diperbarui.');
    }
    
    public function destroy($id_transaksi)
    {  
        // Mengambil transaksi yang ingin dihapus
        $transaksi = Transaksi::where('id_transaksi', $id_transaksi)->first();

        if (!$transaksi) {
            return redirect('/pemesanan')->with('error', 'Transaksi tidak ditemukan.');
        }

        // Menghapus dtTransaksi yang terkait dengan transaksi ini
        dtTransaksi::where('id_transaksi', $id_transaksi)->delete();

        // Menghapus transaksi
        $transaksi->delete();

        return redirect('/kelola-transaksi')->with('success', 'Transaksi berhasil dihapus.');
    }
}
