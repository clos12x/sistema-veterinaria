<?php

namespace App\Http\Controllers\Empleado;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\RespuestaEmpleado;
use App\Models\Mensaje;
use App\Models\Respuesta;

class BuzonController extends Controller
{
    // Mostrar los mensajes del buzón del empleado
    public function index()
    {
        $mensajes = Mensaje::where('empleado_id', Auth::id())
                           ->orderBy('created_at', 'desc')
                           ->get();

        return view('empleado.buzon.index', compact('mensajes'));
    }

    // Responder a un mensaje y enviar al administrador
    public function responder(Request $request)
    {
        $request->validate([
            'mensaje_id' => 'required|exists:mensajes,id',
            'respuesta'  => 'required|string',
            'archivo_respuesta' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $mensajeOriginal = Mensaje::findOrFail($request->mensaje_id);
        $archivo = $request->file('archivo_respuesta');
        $archivoNombre = null;

        // Guardar el archivo en disco
        if ($archivo) {
            $archivoNombre = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('respuestas_adjuntas'), $archivoNombre);
        }

        // Guardar la respuesta en la base de datos
        Respuesta::create([
            'mensaje_id'   => $mensajeOriginal->id,
            'empleado_id'  => Auth::id(),
            'respuesta'    => $request->respuesta,
            'archivo'      => $archivoNombre,
        ]);

        // Enviar correo al administrador
        $adminEmail = 'admin@admin.com'; // ← Asegúrate que esté bien configurado en tu .env o cambia aquí
        Mail::to($adminEmail)->send(new RespuestaEmpleado(
            $request->respuesta,
            Auth::user()->name,
            $archivo
        ));

        return back()->with('success', 'Respuesta enviada correctamente al administrador y registrada.');
    }
}

