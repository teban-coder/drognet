<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pedido;
    public $carrito;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pedido, $carrito)
    {
        $this->pedido = $pedido;
        $this->carrito = $carrito;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Pedido en Tienda en línea')->view('emails.pedido');
    }
}
