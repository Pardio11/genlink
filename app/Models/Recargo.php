<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Recargo extends Model
{
    use HasFactory;

    protected $fillable = ['monto', 'descripcion'];

    public function recargo(): HasOne
    {
        return $this->hasOne(Recargo::class);
    }
}
