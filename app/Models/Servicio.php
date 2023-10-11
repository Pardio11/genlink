<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';

    protected $fillable = [
        't_servicio_id',
        'F_Pago',
    ];

    public function tServicio()
    {
        return $this->belongsTo(TServicio::class, 't_servicio_id');
    }
}