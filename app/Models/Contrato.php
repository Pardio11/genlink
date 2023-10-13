<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contrato extends Model
{
    protected $table = 'contratos';

    protected $fillable = [
        'fecha_instalacion',
        'dia_corte',
        'velocidad',
        'precio',
        'descuento_id',
        'instalacion_id'
    ];

    protected $dates = ['fecha_instalacion'];
    public function descuentos(): HasMany
    {
        return $this->hasMany(Descuento::class);
    }
    
    public function pago(): HasOne
    {
        return $this->hasOne(Pago::class);
    }
    public function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class);
    }
    public function instalaciones(): HasOne
    {
        return $this->hasOne(Instalacion::class);
    }
}
