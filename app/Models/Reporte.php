<?php

namespace App\Models;

use Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reporte extends Model
{
    use HasFactory;
    protected $fillable = ['asunto', 'descripcion'];
    public function cliente():HasOne
    {
        return $this->hasOne(Cliente::class);
    }
}
