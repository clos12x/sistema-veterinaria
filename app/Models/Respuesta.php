<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable = ['mensaje_id', 'empleado_id', 'respuesta', 'archivo'];

    public function empleado()
    {
        return $this->belongsTo(User::class, 'empleado_id');
    }

    public function mensaje()
    {
        return $this->belongsTo(Mensaje::class, 'mensaje_id');
    }
}
