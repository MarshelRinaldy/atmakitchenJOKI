<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoPoint extends Model
{
    use HasFactory;

    protected $table = 'promopoint';

    protected $fillable = [
        'nama',
        'jumlah_point',
        'tanggal_dimulai',
        'tanggal_berakhir',
        'deskripsi',
    ];

}
