<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
	public function index()
	{
		$users = User::orderBy('rol')->paginate(10);

		return view('admin.users.index', compact('users'));
	}

	public function edit($Id)
	{
		$user = User::findOrFail($Id);

		return view('admin.users.edit', compact('user'));
	}

	public function update(Request $request, $Id)
	{
		//dd($request->all());
		$user = User::findOrFail($Id);

		$user->update([
			'name' => request('name'),
			'email' => request('email'),
			'rol' => request('rol'),
			'Direccion' => request('Direccion'),
		]);

		return redirect()->route('admin.users.index');
	}

	public function reset($Id)
	{
		$user = User::findOrFail($Id);

		return view('admin.users.reset', compact('user'));
	}

	public function storePassword(Request $request, $Id)
	{
		$user = User::findOrFail($Id);

		$user->update([
			'password' => Hash::make($request->password),
		 ]);

		return redirect()->route('admin.users.index')->with('msg', 'Password actualizado correctamente');
	}

	public function delete($Id)
	{
		$user = User::findOrFail($Id); // Verificar dependencias para evitar una excepción
		$user->delete();
		
		return redirect()->route('admin.users.index');
	}
}
