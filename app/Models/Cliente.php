<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'n_id','direccion','telefono','instalacion_id','contrato_id','antena_id','router_id','zona_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            do {
                $user->n_id = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            } while (self::where('n_id', $user->n_id)->exists());
        });
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
    //Bien
    public function instalacion(): BelongsTo
    {
        return $this->belongsTo(Instalacion::class);
    }

    public function pagos(): BelongsTo
    {
        return $this->belongsTo(Pago::class);
    }
    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class);
    }

    public function contrato(): BelongsTo
    {
        return $this->belongsTo(Contrato::class);
    }

    public function antena(): BelongsTo
    {
        return $this->belongsTo(Antena::class);
    }

    public function router(): BelongsTo
    {
        return $this->belongsTo(Router::class);
    }

    public function zona(): BelongsTo
    {
        return $this->belongsTo(Zona::class);
    }
}
