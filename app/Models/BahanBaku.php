<?php

namespace App\Models;

use App\Models\Resep;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BahanBaku extends Model
{
    use HasFactory;
    protected $table = 'bahan_baku';

    protected $fillable = ['nama_bahan_baku', 'stok_bahan_baku', 'satuan_bahan_baku', 'harga_bahan_baku'];


    public function products()
    {
        return $this->belongsToMany(Dukpro::class, 'reseps')
            ->using(Resep::class)
            ->withPivot('jumlah')
            ->withTimestamps();
    }

    public function catatBahanBaku(){
        return $this->hasMany(catatBB::class);
    }

}

