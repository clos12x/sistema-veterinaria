<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $fillable = [
        'empleado_id',
        'asunto',
        'mensaje',
        'archivo',
        'leido',
    ];
}

