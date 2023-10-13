<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Antena extends Model
{
    use HasFactory;

    protected $fillable = ['ip', 'mac', 'user', 'password', 'dispositivo_id'];

    public function dispositivo(): HasOne
    {
        return $this->hasOne(Dispositivo::class);
    }
    public function cliente(): HasMany
    {
        return $this->hasMany(Cliente::class);
    }
    public function zona(): BelongsTo
    {
        return $this->belongsTo(Zona::class);
    }

}
