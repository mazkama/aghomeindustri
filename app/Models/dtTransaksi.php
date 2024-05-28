<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtTransaksi extends Model
{
    use HasFactory;
    protected $table = 'detail_tr';
    protected $primaryKey = 'id_dt_tr';
    protected $fillable = ['id_dt_tr','id_user','kode_produk','jumlah_produk','ukuran','harga']; 

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'kode_produk', 'kode_produk');
    }
}
