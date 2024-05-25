<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'user_id',
        'metode_pembayaran',
        'tanggal_transaksi',
        'jumlah_transaksi',
        'bukti_pembayaran',
        'status_pengantaran',
        'jenis_delivery',
        'jarak_delivery',
        'alamat_pengantaran',
        'biaya_ongkir',
        'total_harga',
        'status_transaksi',
        'status_pembayaran',
        'image_bukti_pembayaran',
        'no_transaksi',
    ];

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pemasukanPerusahaans()
    {
        return $this->hasMany(PemasukanPerusahaan::class, 'transaksi_id');
    }
}
