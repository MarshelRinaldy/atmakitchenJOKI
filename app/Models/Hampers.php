<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dukpro;

class Hampers extends Model
{
    use HasFactory;
     /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'produk_id',
        'nama',
        'harga',
        'stok',
        'ukuran',
        'berat',
        'deskripsi',
        'image',
    ];

    public function dataProduk(){
        return $this->belongsTo(Dukpro::class,'produk_id');
    }
}