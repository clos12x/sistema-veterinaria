<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductoEnCamino extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;
    public $orden;

    /**
     * Create a new message instance.
     */
    public function __construct($cliente, $orden)
    {
        $this->cliente = $cliente;
        $this->orden = $orden;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('📦 Tu pedido está en camino - Veterinaria Huellitas')
                    ->view('emails.producto_en_camino');
    }
}
