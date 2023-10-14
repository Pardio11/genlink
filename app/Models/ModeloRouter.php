<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModeloRouter extends Model
{
    use HasFactory;
    protected $fillable = ['modelo', 'marca'];

    public function router(): HasMany
    {
        return $this->hasMany(Router::class);
    }
}
