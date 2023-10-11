<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antena extends Model
{
    use HasFactory;

    protected $fillable = ['ip', 'mac', 'user', 'password', 'dispositivo_id'];

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class);
    }

}
