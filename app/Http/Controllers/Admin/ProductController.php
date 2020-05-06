<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\productos;
use App\tipomedicamentos;

class ProductController extends Controller
{
	public function index()
	{
		$productos = \DB::table('productos')
		->join('tipomedicamentos','tipomedicamentos.IdTipoMedicamento','productos.IdTipoMedicamento')
		->select('productos.Lote','productos.IdProducto','productos.Nombre','productos.Imagen','productos.Precio','productos.FechaVencimiento','productos.Laboratorio','tipomedicamentos.Nombre as tip')->paginate(10);

		return view('admin.products.index',['productos'=>$productos]);
	}

	public function create()
	{
		$tipomedicamento = tipomedicamentos::orderBy('Nombre','asc')->get();

		return view('admin.products.create', ['tipomedicamento'=>$tipomedicamento]);
	}

	public function store(Request $request)
	{
		if($request->hasFile('Imagen')) {
			$file = $request->file('Imagen');
			$filename = rand(111, 99999) . $file->getClientOriginalName();

			if($file->move(base_path() . '/public/images/productos/', $filename)){
				productos::create([
					'Nombre' => request('Nombre'),
					'IdTipoMedicamento' => request('tipomedicamento'),
					'Imagen' => $filename,
					'Laboratorio' => request('Laboratorio'),
					'Precio' => request('Precio'),
					'Lote' => request('Lote'),
					'FechaVencimiento' => request('FechaVencimiento')
				]);

				return redirect()->route('admin.products.index');
			}
		}
	}

	public function edit($Id)
	{
		$productos=productos::findOrFail($Id);
		$medicamentos=tipomedicamentos::orderBy('Nombre','ASC')->get();

		return view('admin.products.edit')->with('productos',$productos)->with('medicamentos',$medicamentos);
	}

	public function update(Request $request, $Id)
	{
		$productos = productos::findOrFail($Id);

		if($request->hasFile('Imagen')) {
			$file = $request->file('Imagen');
			$filename = rand(111, 99999) . $file->getClientOriginalName();

			$file->move(base_path() . '/public/images/productos/', $filename);
		}

		$productos->update([
			'Nombre' => request('Nombre'),
			'IdTipoMedicamento' => request('medicamento'),
			'Imagen' => $request->hasFile('Imagen') ? $filename : $productos->Imagen,
			'Laboratorio' => request('Laboratorio'),
			'Precio' => request('Precio'),
			'Lote' => request('Lote'),
			'FechaVencimiento' => request('FechaVencimiento')
		 ]);

		return redirect()->route('admin.products.index');
	}

	public function delete($Id)
	{
		$productos=productos::findOrFail($Id);
		$productos->delete();
		
		return redirect()->route('admin.products.index');
	}
}
