<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';

    protected $fillable = [
        't_servicio_id',
        'F_Pago',
    ];

    public function tServicio() : HasOne
    {
        return $this->hasOne(TServicio::class);
    }
}