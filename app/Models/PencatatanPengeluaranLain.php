<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencatatanPengeluaranLain extends Model
{
    use HasFactory;

    protected $table = 'pencatatan_pengeluaran_lain';

    protected $fillable = ['nama_pengeluaran', 'harga_pengeluaran', 'tanggal_pengeluaran', 'kategori_pengeluaran'];
}