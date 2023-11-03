<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Caja extends Model
{
    use HasFactory;
    protected $fillable = ['fecha','cobrador_id'];
    public function pagos(): HasMany
    {
        return $this->hasMany(Pago::class);
    }
    public function cobrador(): BelongsTo
    {
        return $this->belongsTo(Cobrador::class);
    }
}
