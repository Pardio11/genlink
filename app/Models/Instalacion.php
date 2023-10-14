<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Instalacion extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_limite', 'nota', 'realizado'];
    protected $dates = ['fecha_limite'];
    protected $casts = [
        'realizado' => 'boolean' // Convertir realizado a formato booleano
    ];

    public function cliente():HasOne
    {
        return $this->hasOne(Cliente::class);
    }
}
