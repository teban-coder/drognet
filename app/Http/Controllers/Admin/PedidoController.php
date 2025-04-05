<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Pedido;
use App\PedidoItem;
use App\productos;
use App\User;
use Session;
use Auth;

class PedidoController extends Controller
{
	public function index(Request $request, $tipo = '')
	{
		$fecha = $request->get('fecha');

		$pedidos = Pedido::with('pedidoItems')
		->where('tipo', 'LIKE', "%$tipo%")
		->orderBy('fecha', 'desc')
		->orderBy('id', 'desc')
		->fecha($fecha)
		->paginate(10);

		return view('admin.pedidos.index', compact('pedidos'));
	}

	public function detail($Id)
	{
		$pedido = Pedido::with('pedidoItems')->findOrFail($Id);

		foreach ($pedido->pedidoItems as $item) {
			$item->producto = productos::find($item->producto_id);
		}

		$items = $pedido->pedidoItems;

		return view('admin.pedidos.detail', compact('pedido', 'items'));
	}

	public function delete($Id)
	{
		$pedido = Pedido::findOrFail($Id);

		foreach ($pedido->pedidoItems as $item) {
			$this->actualizarStock($item, $item->cantidad);
			$item->delete();
		}

		$pedido->delete();

		return redirect()->route('admin.pedidos.index');
	}

	protected function actualizarStock($item, $cantidad)
	{
		$producto = productos::findOrFail($item->producto_id);

		$producto->update([
			'stock' => $producto->stock + $cantidad
		]);
	}

	protected function procesar()
	{
		$subtotal = 0;
		$carrito = Session::get('carrito2');
		$envio = 0;

		if (count($carrito) <= 0) {
			return redirect()->route('admin.carrito.index')
				->with('message', 'Elija los productos de la venta');
		}
 
		foreach($carrito as $producto){
			$subtotal += $producto->cantidad * $producto->Precio;
		}
 
		$pedido = Pedido::create([
			'user_id' => Auth::user()->id,
			'tipo' => 'presencial',
			'tipopago_id' => 1,
			'subtotal' => $subtotal,
			'envio' => $envio,
			'fecha' => date('Y-m-d'),
			'referencia' => Str::random(20)
		]);
 
		foreach($carrito as $producto){
			$this->guardarPedidoItem($producto, $pedido->id);
		}

		Session::forget('carrito2');

		return redirect()->route('admin.pedidos.detail', $pedido)
			->with('msg', 'Venta finalizada correctamente');
	}

	protected function guardarPedidoItem($producto, $pedido_id)
	{
		$item = PedidoItem::create([
			'pedido_id' => $pedido_id,
			'producto_id' => $producto->IdProducto,
			'cantidad' => $producto->cantidad,
			'precio' => $producto->Precio,
		]);

		$this->actualizarStock($item, $item->cantidad * -1);
	}
}
