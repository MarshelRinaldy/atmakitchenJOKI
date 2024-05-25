<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BahanBaku;

class catatBB extends Model
{
    protected $table = 'bahanbaku';
    use HasFactory;
     /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        // 'nama',
        'bahan_baku_id',
        'jumlah',
        'harga',
        'tanggal_pembelian',
        'tanggal_kadaluarsa',
        'satuan'
    ];

    public function databahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_id');
    }
    
}