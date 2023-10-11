<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contrato extends Model
{
    protected $table = 'contratos';

    protected $fillable = [
        'f_instalacion',
        'dia_corte',
        'velocidad',
        'precio',
        'descuento_id',
        'recargo_id',
    ];

    public function descuentos(): HasMany
    {
        return $this->hasMany(Descuento::class);
    }
    public function recargo(): HasOne
    {
        return $this->hasOne(Recargo::class);
    }
    public function pago(): HasOne
    {
        return $this->hasOne(Pago::class);
    }
    public function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class);
    }
}
