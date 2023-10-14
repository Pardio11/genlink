<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Antena extends Model
{
    use HasFactory;

    protected $fillable = ['ip', 'mac', 'user', 'password', 'modelo_antena_id'];

    public function modeloAntena(): BelongsTo
    {
        return $this->belongsTo(ModeloAntena::class);
    }
    public function cliente(): HasOne
    {
        return $this->hasOne(Cliente::class);
    }
    public function zona(): HasOne
    {
        return $this->hasOne(Zona::class);
    }

}
