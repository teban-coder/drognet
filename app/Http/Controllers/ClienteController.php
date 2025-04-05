<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		return view('cliente.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);

        $user->update([
			'name' => request('name'),
			'apellido' => request('apellido'),
			'documento' => request('documento'),
			'celular' => request('celular'),
			'email' => request('email'),
			'Direccion' => request('Direccion'),
		]);

		return redirect()->route('cliente.index')->with('msg', 'sus datos se han actualizado con exito');
    }

    public function updateFacturacion(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);

        $user->update([
			'name' => request('name'),
			'apellido' => request('apellido'),
			'documento' => request('documento'),
			'celular' => request('celular'),
			'email' => request('email'),
			'Direccion' => request('Direccion'),
		]);

		return redirect()->route('factura.factura')->with('msg', 'sus datos se han actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
