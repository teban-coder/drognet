<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\productos;
use App\tipomedicamentos;
// use App\Requests\ProductRequest;


class ProductController extends Controller
{
	public function index(Request $request)
	{

		$tip    = $request->get('tip');
		$Nombre = $request->get('Nombre');
		$Laboratorio = $request->get('Laboratorio');


		$productos = productos::OrderBy('IdProducto', 'ASC')
		->join('tipomedicamentos','tipomedicamentos.IdTipoMedicamento','productos.IdTipoMedicamento')
		->select('productos.Lote','productos.IdProducto','productos.Nombre','productos.Imagen','productos.stock','productos.Precio','productos.FechaVencimiento','productos.Laboratorio','tipomedicamentos.nombre as tip')
		->Laboratorio($Laboratorio)
		->Nombre($Nombre)
		->tip($tip)
		->paginate(4);

		return view('admin.products.index',['productos'=>$productos]);
	}

	public function create()
	{
		$tipomedicamento = tipomedicamentos::orderBy('Nombre','asc')->get();

		return view('admin.products.create', ['tipomedicamento'=>$tipomedicamento]);
	}

	public function store(Request $request)
	{
		 $this->validate($request,[
			 'Nombre' => 'required|unique:productos,Nombre|max:10',
		 	 'Imagen' => 'required',
		 	 'Laboratorio' =>'required',
		 	 'stock' => 'required',
		 	 'Precio' => 'required',
			 'Lote' => 'required',  
		 	 'FechaVencimiento' => 'required'
		 ]);

		if($request->hasFile('Imagen')) { //Aqui valido si viene una nueva imagen para poder guardarla
			$file = $request->file('Imagen'); //Aqui guardo mi nueva imagen
			$filename = rand(111, 99999) . $file->getClientOriginalName();//Aqui utilizo esta funcion para que no se dupliquen los nombres, toma el nombre original y le antepone un numero aleatorio

			if($file->move(base_path() . '/public/images/productos/', $filename)){ //Aqui muevo el archivo a la carpeta public/images/productos
				productos::create([
					'Nombre' => request('Nombre'),
					'IdTipoMedicamento' => request('tipomedicamento'),
					'Imagen' => $filename,
					'Laboratorio' => request('Laboratorio'),
					'stock' => request('stock'),
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

		return view('admin.products.edit')
		->with('productos',$productos)->with('medicamentos',$medicamentos);
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
			'stock' => request('stock'),
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
