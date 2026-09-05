<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class EnviarPdfMailable extends Mailable
{
    public $asunto;
    public $mensaje;
    public $rutaCompleta;

    public function __construct($asunto, $mensaje, $rutaCompleta)
    {
        $this->asunto = $asunto;
        $this->mensaje = $mensaje;
        $this->rutaCompleta = $rutaCompleta;
    }

    public function build()
    {
        return $this->subject($this->asunto)
                    ->view('emails.pdf')
                    ->attach($this->rutaCompleta); // ruta absoluta clara y robusta
    }
}
