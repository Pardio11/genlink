<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TipoDescuento extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'monto'];
 
    public function descuento(): HasOne
    {
        return $this->hasOne(Descuento::class);
    }
}
