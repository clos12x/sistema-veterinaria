<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoEmpleado extends Mailable
{
    use Queueable, SerializesModels;

    public $mensaje;
    public $asunto;
    public $archivoAdjunto;

    public function __construct($mensaje, $asunto, $archivoAdjunto = null)
    {
        $this->mensaje = $mensaje;
        $this->asunto = $asunto;
        $this->archivoAdjunto = $archivoAdjunto;
    }

    public function build()
    {
        $mail = $this->subject($this->asunto)
                     ->markdown('emails.empleado')
                     ->with(['mensaje' => $this->mensaje]);

        if ($this->archivoAdjunto) {
            $mail->attach($this->archivoAdjunto->getRealPath(), [
                'as' => $this->archivoAdjunto->getClientOriginalName(),
                'mime' => $this->archivoAdjunto->getClientMimeType(),
            ]);
        }

        return $mail;
    }
}
