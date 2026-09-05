<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RespuestaEmpleado extends Mailable
{
    use Queueable, SerializesModels;

    public $respuesta;
    public $nombreEmpleado;
    public $archivoAdjunto;

    public function __construct($respuesta, $nombreEmpleado, $archivoAdjunto = null)
    {
        $this->respuesta = $respuesta;
        $this->nombreEmpleado = $nombreEmpleado;
        $this->archivoAdjunto = $archivoAdjunto;
    }

    public function build()
    {
        $correo = $this->subject('Respuesta de Empleado - Veterinaria Huellitas')
                       ->markdown('emails.respuesta_empleado')
                       ->with([
                           'respuesta' => $this->respuesta,
                           'nombreEmpleado' => $this->nombreEmpleado,
                       ]);

        if ($this->archivoAdjunto) {
            $correo->attach($this->archivoAdjunto->getRealPath(), [
                'as' => $this->archivoAdjunto->getClientOriginalName(),
                'mime' => $this->archivoAdjunto->getClientMimeType(),
            ]);
        }

        return $correo;
    }
}

