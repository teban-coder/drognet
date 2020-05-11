<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pedido;
use App\PedidoItem;
use App\productos;
use App\User;

class PedidoController extends Controller
{
	public function index()
	{
		$pedidos = Pedido::with('pedidoItems')->orderBy('fecha', 'desc')->paginate(10);

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
			$item->delete();
		}

		$pedido->delete();

		return redirect()->route('admin.pedidos.index');
	}

	
}
