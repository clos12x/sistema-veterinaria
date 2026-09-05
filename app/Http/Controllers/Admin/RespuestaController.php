<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Respuesta;

class RespuestaController extends Controller
{
    public function index()
    {
        $respuestas = Respuesta::with(['empleado', 'mensaje'])->latest()->get();
        return view('admin.respuestas.index', compact('respuestas'));
    }
}

