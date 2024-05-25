<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasukanPerusahaan extends Model
{
    use HasFactory;

    protected $table = 'pemasukan_perusahaan';

    protected $fillable = [
        'transaksi_id',
        'tanggal_income',
        'jumlah_income',
        'deskripsi',
        'transaksi_id',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
