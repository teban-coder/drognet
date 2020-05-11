<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opinion;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// $this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		return view('welcome');
	}

	public function products()
	{
		$productos = \DB::table('productos')
		->join('tipomedicamentos','tipomedicamentos.IdTipoMedicamento','productos.IdTipoMedicamento')
		->select('productos.Lote','productos.IdProducto','productos.Nombre','productos.Imagen','productos.Precio','productos.Laboratorio','tipomedicamentos.Nombre as tip')->paginate(9);

		return view('productos/home',['productos'=>$productos]);
	}

	public function detail($Id)
	{
		$productos = \DB::table('productos') 
		->join('tipomedicamentos','tipomedicamentos.IdTipoMedicamento','productos.IdTipoMedicamento')
		->select('productos.FechaVencimiento','productos.IdProducto','productos.Nombre as Nombre','productos.Imagen'
		,'productos.Precio','productos.Laboratorio','tipomedicamentos.Nombre as tip','productos.Lote')
		->where('productos.IdProducto','=',$Id)->get();

		return view('productos/detail',['productos'=>$productos]);
	}

	public function opinion()
	{
		return view('opinion');
	}

	public function opinionStore(Request $request)
	{
		$this->validate($request, [
			'tema' => 'required',
			'mensaje' => 'required'
		]);

		 Opinion::create([
			'tema' => request('tema'),
			'mensaje'=>request('mensaje'),
		]);

		return redirect()->route('opinion')
			->with('msg', 'Su mensaje se ha enviado correctamente');
	}
}
