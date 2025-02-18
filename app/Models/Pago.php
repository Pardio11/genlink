<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';

    protected $fillable = [
        'fecha_pagado',
        'fecha_limite',
        'cliente_id',
        'tipo_servicio_id',
        'recargo_id',
        'caja_id',
    ];
    protected $dates = ['fecha_pagado','fecha_limite'];

    //bien
    public function tipoServicio():BelongsTo
    {
        return $this->belongsTo(TipoServicio::class);
    }
    //bien
    public function recargo(): BelongsTo
    {
        return $this->belongsTo(Recargo::class);
    }
    //bien
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
    public function caja(): BelongsTo
    {
        return $this->belongsTo(Caja::class);
    }
}
