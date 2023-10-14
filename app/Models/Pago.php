<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';

    protected $fillable = [
        'fecha_pagado',
        'fecha_limite',
        'contrato_id',
        't_servicio_id',
        'recargo_id'
    ];
    protected $dates = ['fecha_pagado','fecha_limite'];

    //bien
    public function contrato():BelongsTo
    {
        return $this->belongsTo(Contrato::class);
    }
    //bien
    public function tipoServicio():BelongsTo
    {
        return $this->belongsTo(TipoServicio::class);
    }
    //bien
    public function recargo(): HasOne
    {
        return $this->hasOne(Recargo::class);
    }
    //bien
    public function clientes(): BelongsToMany
    {
        return $this->belongsToMany(Cliente::class);
    }
}
