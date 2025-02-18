<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Reporte extends Model
{
    use HasFactory;
    protected $fillable = ['asunto', 'descripcion','resuelto','cliente_id','fecha'];
    public function cliente():BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}
