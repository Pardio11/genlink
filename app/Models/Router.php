<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Router extends Model
{
    use HasFactory;
    protected $fillable = ['users', 'password', 'ip', 'mac', 'modelo_router_id'];

    public function modeloRouter(): BelongsTo
    {
        return $this->belongsTo(ModeloRouter::class);
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
