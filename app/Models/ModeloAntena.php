<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModeloAntena extends Model
{
    use HasFactory;
    protected $fillable = ['modelo', 'marca'];

    public function antena(): HasMany
    {
        return $this->hasMany(Antena::class);
    }
}
