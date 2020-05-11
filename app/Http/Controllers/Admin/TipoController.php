<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tipomedicamentos;

class TipoController extends Controller
{
	public function index()
	{
		$tipos = tipomedicamentos::orderBy('Nombre', 'asc')->paginate(10);

		return view('admin.tipos.index', compact('tipos'));
	}

	public function create()
	{
		return view('admin.tipos.create');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'Nombre' => 'required|unique:tipomedicamentos,Nombre|max:10'
		]);

		tipomedicamentos::create([
			'Nombre' => request('Nombre'),
		]);

		return redirect()->route('admin.tipos.index');
	}

	public function edit($Id)
	{
	
		$tipo = tipomedicamentos::findOrFail($Id);

		return view('admin.tipos.edit', compact('tipo'));
	}

	public function update(Request $request, $Id)
	{
		$tipo = tipomedicamentos::findOrFail($Id);

		$tipo->update([
			'Nombre' => request('Nombre'),
		 ]);

		return redirect()->route('admin.tipos.index');
	}

	public function delete($Id)
	{
		$tipo = tipomedicamentos::findOrFail($Id); // Verificar dependencias o integridad referencial para evitar una excepción	
		$tipo->delete();						
		
		return redirect()->route('admin.tipos.index');
	}
}
