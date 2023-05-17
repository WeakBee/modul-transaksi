<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    public $table = "transaksi";
    use HasFactory;
    use HasFormatRupiah;
    protected $fillable = [
        'id_transaksi',
        'nama_pembeli',
        'email_pembeli',
        'nama_barang',
        'harga_barang',
        'jumlah_barang',
        'total_harga'
    ];
}
