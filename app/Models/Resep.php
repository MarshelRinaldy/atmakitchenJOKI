<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\BahanBaku;
use Illuminate\Database\Eloquent\Relations\Pivot;


class Resep extends Pivot
{
    protected $table = 'reseps';

    protected $fillable = ['produk_id', 'bahan_baku_id', 'jumlah'];

    public function product()
    {
        return $this->belongsTo(Dukpro::class, 'produk_id');
    }

    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_id');
    }

    
}
