<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Zona extends Model
{
    use HasFactory;
    protected $table = 'zonas';

    protected $fillable = [
        'nombre',
        'direccion',
        'alcance',
        'antena_id',
        'router_id',
    ];

    public function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class);
    }
    public function routers(): BelongsTo
    {
        return $this->belongsTo(Router::class);
    }

    public function antenas(): BelongsTo
    {
        return $this->belongsTo(Antena::class);
    }
}
