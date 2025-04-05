<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\productos;
use Session;

class Carrito2Controller extends Controller
{
	public function __construct()
	{
		if(!Session::has('carrito2')) Session::put('carrito2', array());
	}

	public function index()
	{
		$productos = productos::where('stock', '>', 0)->orderBy('Nombre')->get();
		$carrito = Session::get('carrito2');
		$total = $this->total();

		return view('admin.carrito.index', compact('productos', 'carrito', 'total'));
	}

	public function create(productos $productos)
	{
		$carrito = Session::get('carrito2');
		$productos->cantidad = 1;
		$carrito[$productos->Lote] = $productos;
		Session::put('carrito2', $carrito);

		return redirect()->route('admin.carrito.index');
	}

	public function delete(productos $productos)
	{
		$carrito = Session::get('carrito2');
		unset($carrito[$productos->Lote]);
		Session::put('carrito2', $carrito);

		return redirect()->route('admin.carrito.index');
	}

	public function trash()
	{
		Session::forget('carrito2');
		return redirect()->route('admin.carrito.index');
	}

	public function update(productos $productos, $cantidad)
	{
		$carrito = Session::get('carrito2');
		$carrito[$productos->Lote]->cantidad = $cantidad;
		Session::put('carrito2', $carrito);

		return redirect()->route('admin.carrito.index');
	}

	private function total()
	{
		$carrito = Session::get('carrito2');
		$total = 0;

		foreach ($carrito as $item) {
			$total += $item->Precio * $item->cantidad;
		}
		return $total;
	}
}
