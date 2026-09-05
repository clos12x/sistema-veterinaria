<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mensaje;
use Illuminate\Support\Facades\Mail;
use App\Mail\CorreoEmpleado;

class CorreoEmpleadoController extends Controller
{
    public function formulario()
    {
        $empleados = User::where('role', 'empleado')->get(); // Ajusta si usas otra lógica de roles
        return view('admin.empleados.enviar_correo', compact('empleados'));
    }

    public function enviar(Request $request)
    {
        $request->validate([
            'empleado_id' => 'required|exists:users,id',
            'asunto' => 'required|string',
            'mensaje' => 'required|string',
            'archivo_pdf' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $empleado = User::findOrFail($request->empleado_id);
        $archivo = $request->file('archivo_pdf');

        // Guardar archivo si se adjunta
        $nombreArchivo = null;
        if ($archivo) {
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('mensajes_adjuntos'), $nombreArchivo);
        }

        // Enviar correo externo
        Mail::to($empleado->email)->send(new CorreoEmpleado(
            $request->mensaje,
            $request->asunto,
            $archivo
        ));

        // Guardar mensaje en la base de datos (buzón interno)
        Mensaje::create([
            'empleado_id' => $empleado->id,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
            'archivo' => $nombreArchivo,
            'leido' => false,
        ]);

        return back()->with('success', 'Correo enviado y mensaje registrado correctamente.');
    }
}

