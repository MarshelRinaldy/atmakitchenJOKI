<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'nip', 'gaji', 'bonus'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

