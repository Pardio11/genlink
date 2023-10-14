<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function descuentos(): HasMany
    {
        return $this->hasMany(Descuento::class);
    }
    
    public function clientes(): HasOne
    {
        return $this->hasOne(Cliente::class);
    }
    
}
