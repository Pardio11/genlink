<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dispositivo extends Model
{
    use HasFactory;
    protected $fillable = ['modelo', 'marca', 'cantidad'];

    public function antena(): HasOne
    {
        return $this->hasOne(Antena::class);
    }
    public function router(): HasOne
    {
        return $this->hasOne(Router::class);
    }
}
