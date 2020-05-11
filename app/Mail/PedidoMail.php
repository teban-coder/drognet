<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pedido; //Aqui vinculo la informacion del pedido y del carrito y las guarda
    public $carrito;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pedido, $carrito)
    {
        $this->pedido = $pedido;  //Aqui seteamos o vinculamos la informacion de las variables que le pasamos como parametro en el controlador
        $this->carrito = $carrito; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() //Toda la informacion de esas dos variables las va a pasar a mi vista emails.pedido
    {
        return $this->subject('Pedido de drogueria las nieves en linea')->view('emails.pedido'); 
    }
}
