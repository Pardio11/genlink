<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Descuento extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_inicio', 'vigencia', 't_descuento_id'];
    //bien
    public function tipoDescuento(): BelongsTo
    {
        return $this->belongsTo(TipoDescuento::class);
    }
    //bien
    public function contrato(): BelongsToMany
    {
        return $this->belongsToMany(Contrato::class);
    }
    
}
