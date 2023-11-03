<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cobrador extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','telefono','ubicacion'];
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
    public function cajas(): HasMany
    {
        return $this->hasMany(Caja::class);
    }

}
