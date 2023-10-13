<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';

    protected $fillable = [
        'fecha_pagado',
        'contrato_id',
        'servicio_id',
        'recargo_id'
    ];
    protected $dates = ['fecha_pagado'];

    public function contrato():HasOne
    {
        return $this->hasOne(Contrato::class);
    }

    public function servicio():HasOne
    {
        return $this->hasOne(Servicio::class);
    }

    public function clientes():BelongsToMany
    {
        return $this->BelongsToMany(Cliente::class);
    }
    public function recargo(): HasOne
    {
        return $this->hasOne(Recargo::class);
    }
}
