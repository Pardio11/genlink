<?php

namespace App\Models;

use Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Reporte extends Model
{
    use HasFactory;
    protected $fillable = ['asunto', 'descripcion'];
    public function cliente():BelongsToMany
    {
        return $this->belongsToMany(Cliente::class);
    }
}
