<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoDescuento extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'monto'];
    //bien
    public function descuento(): HasMany
    {
        return $this->hasMany(Descuento::class);
    }
}
