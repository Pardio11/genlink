<?php
namespace App\Models;

use App\Models\Instalacion;
use App\Models\Reporte;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'n_id',
        'image_data',
        'direccion',
        'telefono',
        'correo',
        'pago_id',
        'contrato_id',
        'antena_id',
        'router_id',
        'zona_id',
    ];
    protected $hidden = [
        'password'
    ];

    public function pagos(): BelongsToMany
    {
        return $this->belongsToMany(Pago::class);
    }
    public function reportes(): BelongsToMany
    {
        return $this->belongsToMany(Reporte::class);
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
