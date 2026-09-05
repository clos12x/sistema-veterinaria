<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\EnviarPdfMailable;

class CorreoController extends Controller
{
    public function formulario()
    {
        return view('correo.formulario');
    }

    public function enviar(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'asunto' => 'required',
        'mensaje' => 'required',
        'archivo_pdf' => 'required|file|mimes:pdf|max:5120',
    ]);

    // Guarda claramente el archivo en storage/app/pdfs
    $path = $request->file('archivo_pdf')->store('pdfs');

    // Genera una ruta absoluta robusta (definitiva)
    $rutaCompleta = Storage::path($path);

    Mail::to($request->email)->send(new EnviarPdfMailable(
        $request->asunto,
        $request->mensaje,
        $rutaCompleta // ← ahora enviamos ruta absoluta
    ));

    return back()->with('success', 'Correo enviado correctamente con PDF adjunto.');
}
}