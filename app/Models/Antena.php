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

    protected $fillable = ['ip', 'mac', 'user', 'password', 'modelo_antena_id'];

    public function modeloAntena(): BelongsTo
    {
        return $this->belongsTo(ModeloAntena::class);
    }
    public function cliente(): HasMany
    {
        return $this->hasMany(Cliente::class);
    }
    public function zona(): HasMany
    {
        return $this->hasMany(Zona::class);
    }

}
