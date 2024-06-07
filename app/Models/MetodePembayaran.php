<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'metode_pembayaran';
    protected $primaryKey = 'id_mtd_pembayaran';
    protected $fillable = ['id_mtd_pembayaran', 'nama_mtd_pembayaran', 'no_rek_mtd_pembayaran', 'atas_nama_mtd_pembayaran'];
}
