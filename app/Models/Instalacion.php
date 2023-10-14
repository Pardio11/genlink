<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Instalacion extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_limite', 'nota', 'realizado'];
    protected $dates = ['fecha_limite'];
    protected $casts = [
        'realizado' => 'boolean' // Convertir realizado a formato booleano
    ];

    public function contrato():HasMany
    {
        return $this->hasMany(User::class);
    }
}
