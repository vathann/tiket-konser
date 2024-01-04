<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    protected $fillable = [
            'nama_pemilik',
            'no_telephone',
            'kategori',
            'jumlah_tiket',
            'harga_tiket',
            'total_bayar',
            'email',
            'payment_status',
    ];
}
