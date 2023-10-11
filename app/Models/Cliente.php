<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'n_id',
        'direccion',
        'password',
        'pago_id',
        'contrato_id',
        'antena_id',
        'router_id',
        'zona_id',
    ];

    public function pagos(): BelongsToMany
    {
        return $this->belongsToMany(Pago::class);
    }

    public function contrato(): BelongsTo
    {
        return $this->belongsTo(Contrato::class);
    }

    public function antena(): HasOne
    {
        return $this->hasOne(Antena::class);
    }

    public function router(): HasOne
    {
        return $this->hasOne(Router::class);
    }

    public function zona(): BelongsTo
    {
        return $this->belongsTo(Zona::class);
    }
}
