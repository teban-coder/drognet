<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str; //Libreria para generar strings aleatorios
use App\Pedido;
use App\PedidoItem;
use App\productos;

class PedidoController extends Controller
{
	protected function procesar()
	{
		$subtotal = 0;
		$carrito = \Session::get('carrito'); //Obtengo mi carrito de la variablde de sesion
		$envio = 2000;

		if (count($carrito) <= 0) {  //Verifico que halla productos en mi carrito
			return \Redirect::route('products.home')
				->with('message', 'Elija los productos que desea comprar');
		}
 
		foreach($carrito as $producto){ //Recorro los items de mi carrito y obtengo el subtotal
			$subtotal += $producto->cantidad * $producto->Precio;
		}
 
		$pedido = Pedido::create([  //Creo o genero mi pedido 
			'user_id' => \Auth::user()->id, //Obtengo el id del usuario que ha iniciadon sesion
			'tipopago_id' => 1,
			'subtotal' => $subtotal,
			'envio' => $envio,
			'fecha' => date('Y-m-d'),
			'referencia' => Str::random(20)
		]);
 
		foreach($carrito as $producto){//Recorro mi carrito y llamo mi metodo guardarPedidoItem y por cada producto se vaya guardando en mi tabla ventaproducto
			$this->guardarPedidoItem($producto, $pedido->id);
		}

		$this->enviarCorreo($pedido, $carrito);

		\Session::forget('carrito');

		return redirect()->route('products.home')
			->with('msg', 'Hemos recibido tu pedido y te enviamos un correo de seguimiento, gracias por elegirnos');
	}
 
	protected function guardarPedidoItem($producto, $pedido_id) //Genero o creo los items para mi tabla pedido:items o venta producto
	{
		$item = PedidoItem::create([
			'pedido_id' => $pedido_id,
			'producto_id' => $producto->IdProducto,
			'cantidad' => $producto->cantidad,
			'precio' => $producto->Precio,
		]);

		$this->actualizarStock($item);
	}

	protected function actualizarStock($item)
	{
		$producto = productos::findOrFail($item->producto_id);

		$producto->update([
			'stock' => $producto->stock - $item->cantidad
		]);
	}

	protected function enviarCorreo($pedido, $carrito) 
	{
		$to_email = \Auth::user()->email; //Obtengo el email del usuario que se ha logueado
	   
		\Mail::to($to_email)->send(new \App\Mail\PedidoMail($pedido, $carrito)); // Cuando genero un nuevo objeto de esa clase Le digo que envie un nuevo correo al usuario que se almaceno en la variable $to_email 
		                                                                         //utilizando mi clase PedidoMail y que le pase la informacion del pedido y del carrito
	}
}
