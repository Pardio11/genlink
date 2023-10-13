<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Descuento extends Model
{
    use HasFactory;
    protected $fillable = ['F_inicio', 'Vigencia', 't_descuento_id'];

    public function descuento(): BelongsTo
    {
        return $this->belongsTo(Descuento::class);
    }
}
