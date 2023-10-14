<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Descuento extends Model
{
    use HasFactory;
    protected $fillable = ['mes_inicio', 'meses_vigente', 't_descuento_id','contrato_id'];
    //bien
    public function tipoDescuento(): BelongsTo
    {
        return $this->belongsTo(TipoDescuento::class);
    }
    //bien
    public function contrato(): BelongsTo
    {
        return $this->belongsTo(Contrato::class);
    }
    
}
