<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';

    protected $fillable = [
        'contrato_id',
        'servicio_id',
    ];

    public function contrato():HasOne
    {
        return $this->hasOne(Contrato::class, 'contrato_id');
    }

    public function servicio():HasOne
    {
        return $this->hasOne(Servicio::class, 'servicio_id');
    }

    public function clientes():BelongsToMany
    {
        return $this->BelongsToMany(Cliente::class, 'cliente_id');
    }
}
