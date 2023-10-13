<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Zona extends Model
{
    protected $table = 'zonas';

    protected $fillable = [
        'router_id',
        'nombre',
        'direccion',
        'alcance',
        'antena_id',
    ];

    public function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class);
    }
    public function routers(): HasMany
    {
        return $this->hasMany(Router::class);
    }

    public function antenas(): HasMany
    {
        return $this->hasMany(Antena::class);
    }
}
