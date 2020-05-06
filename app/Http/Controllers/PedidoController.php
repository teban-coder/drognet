<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Pedido;
use App\PedidoItem;

class PedidoController extends Controller
{
	protected function procesar()
	{
		$subtotal = 0;
		$carrito = \Session::get('carrito');
		$envio = 100;

		if (count($carrito) <= 0) {
			return \Redirect::route('products.home')
				->with('message', 'Elija los productos que desea comprar');
		}
 
		foreach($carrito as $producto){
			$subtotal += $producto->cantidad * $producto->Precio;
		}
 
		$pedido = Pedido::create([
			'user_id' => \Auth::user()->id,
			'tipopago_id' => 1,
			'subtotal' => $subtotal,
			'envio' => $envio,
			'fecha' => date('Y-m-d'),
			'referencia' => Str::random(20)
		]);
 
		foreach($carrito as $producto){
			$this->guardarPedidoItem($producto, $pedido->id);
		}

		$this->enviarCorreo($pedido, $carrito);

		\Session::forget('carrito');

		return redirect()->route('products.home')
			->with('msg', 'Hemos recibido tu pedido y te enviamos un correo de seguimiento, gracias por tu preferencia');
	}
 
	protected function guardarPedidoItem($producto, $pedido_id)
	{
		PedidoItem::create([
			'pedido_id' => $pedido_id,
			'producto_id' => $producto->IdProducto,
			'cantidad' => $producto->cantidad,
			'precio' => $producto->Precio,
		]);
	}

	protected function enviarCorreo($pedido, $carrito)
	{
		$to_email = \Auth::user()->email;
	   
		\Mail::to($to_email)->send(new \App\Mail\PedidoMail($pedido, $carrito));
	}
}
