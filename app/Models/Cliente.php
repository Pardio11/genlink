<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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


    //Bien
    public function instalacion(): HasOne
    {
        return $this->hasOne(Instalacion::class);
    }

    public function pagos(): BelongsTo
    {
        return $this->belongsTo(Pago::class);
    }
    public function reportes(): BelongsTo
    {
        return $this->belongsTo(Reporte::class);
    }

    public function contrato(): HasOne
    {
        return $this->hasOne(Contrato::class);
    }

    public function antena(): HasOne
    {
        return $this->hasOne(Antena::class);
    }

    public function router(): HasOne
    {
        return $this->hasOne(Router::class);
    }

    public function zona(): HasOne
    {
        return $this->hasOne(Zona::class);
    }
}
