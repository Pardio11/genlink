<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class TipoServicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'costo',
    ];

    public function pagos():HasMany
    {
        return $this->hasMany(Pago::class);
    }
}
