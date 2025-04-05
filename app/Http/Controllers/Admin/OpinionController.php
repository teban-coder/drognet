<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Opinion;

class OpinionController extends Controller
{
	public function index(Request $request)
	{
		$tema= $request->get('tema');
		$mensaje = $request->get('mensaje');

		$opinions = Opinion::orderBy('created_at', 'desc')
		->tema($tema)
		->mensaje($mensaje)
		->paginate(4);
		return view('admin.opinions.index', compact('opinions'));
	}

	public function edit($Id)
	{
		$opinion = Opinion::findOrFail($Id);

		return view('admin.opinions.edit', compact('opinion'));
	}

	public function update(Request $request, $Id)
	{
		$opinion = Opinion::findOrFail($Id);

		$opinion->update([
			'tema' => request('tema'),
			'mensaje' => request('mensaje'),
		]);

		return redirect()->route('admin.opinions.index');
	}

	public function delete($Id)
	{
		$opinion = Opinion::findOrFail($Id);
		$opinion->delete();
		
		return redirect()->route('admin.opinions.index')
		->with('msg', 'Se ha eliminado correctamente');
	}
}
