<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hampers;
class Dukpro extends Model
{
    protected $table = 'dukpro';
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'stok',
        'status',
        'keterangan',
        'tanggal_kadaluarsa',
        'deskripsi',
        'image',
        'kategori',
        //buatkan atribut penitip yang nullable karena jika status nya penitip aja baru penitip ini terisi yang berarti butuh id dari penitip
    ];

     public function bahanBakus()
    {
        return $this->belongsToMany(BahanBaku::class, 'reseps')
                    ->using(Resep::class)
                    ->withPivot('jumlah')
                    ->withTimestamps();
    }

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
    public function catatBahanBaku(){
        return $this->belongToMany(Hampers::class);
    }
}
