<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Router extends Model
{
    use HasFactory;
    protected $fillable = ['users', 'password', 'ip', 'mac', 'modelo_router_id'];

    public function modeloRouter(): BelongsTo
    {
        return $this->belongsTo(ModeloRouter::class);
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
