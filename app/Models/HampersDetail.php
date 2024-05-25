<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HampersDetail extends Model
{
    use HasFactory;

    protected $table = 'hampers_details';

    protected $fillable = [
        'hampers_id',
        'dukpro_id',
    ];

    /**
     * Get the hampers that owns the HampersDetail.
     */
    public function hampers()
    {
        return $this->belongsTo(Hampers::class);
    }

    /**
     * Get the dukpro that owns the HampersDetail.
     */
    public function dukpro()
    {
        return $this->belongsTo(Dukpro::class);
    }
}
