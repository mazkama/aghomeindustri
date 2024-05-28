<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_transaksi','id_user','tanggal_pemesanan','total_bayar','status_pembayaran']; 

    // public function produk()
    // {
    //     return $this->belongsTo(Produk::class, 'kode_produk', 'kode_produk');
    // }
}
