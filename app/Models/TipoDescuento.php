<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TipoDescuento extends Model
{
    protected $fillable = ['nombre', 'monto'];
 
    public function TipoDescuento(): HasOne
    {
        return $this->hasOne(TipoDescuento::class);
    }
}
