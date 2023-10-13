<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Recargo extends Model
{
    use HasFactory;

    protected $fillable = ['monto', 'descripcion'];

    public function pago(): HasOne
    {
        return $this->hasOne(Pago::class);
    }
}
