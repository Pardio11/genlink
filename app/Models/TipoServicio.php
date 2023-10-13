<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TipoServicio extends Model
{
    use HasFactory;


    protected $fillable = [
        'nombre',
        'costo',
    ];

    public function servicios():HasOne
    {
        return $this->hasOne(Servicio::class);
    }
}