<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = ['id_pembayaran','id_transaksi','nama_rekening','rekening','tanggal_pembayaran']; 

    // public function produk()
    // {
    //     return $this->belongsTo(Produk::class, 'kode_produk', 'kode_produk');
    // }
}
