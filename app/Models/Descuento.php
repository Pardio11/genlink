<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Descuento extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_inicio', 'vigencia', 't_descuento_id'];
    protected $dates = ['fecha_inicio', 'vigencia'];
    //F a fecha V a v
    public function tipoDescuento(): HasOne
    {
        return $this->hasOne(TipoDescuento::class);
    }
    public function contrato(): BelongsTo
    {
        return $this->belongsTo(Contrato::class);
    }
    
}
