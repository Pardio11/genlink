<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contrato extends Model
{
    use HasFactory;
    protected $table = 'contratos';

    protected $fillable = [
        'dia_corte',
        'velocidad',
        'precio',
        'activo'
    ];
    public function descuentos(): BelongsToMany
    {
        return $this->belongsToMany(Descuento::class);
    }
    
    public function pago(): HasMany
    {
        return $this->hasMany(Pago::class);
    }
    public function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class);
    }
    
}
