<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) //Este middleware me valida quien va a entrar a mi panel
	{
		// if(in_array(auth()->user()->rol, ['admin', 'vendedor'])){ //Si hay un rol de mi tabla usuarios diferente a admin y vendedor no lo deje pasar y redireccionelo al inicio
		// 	return redirect()->route('admin.products.index');
		// 		// ->with('msg', 'Solo los Administradores o vendedores pueden ingresar a esta sección');
		// }
		if(in_array(auth()->user()->rol, ['cliente'])){ 
			return redirect()->route('inicio')
				->with('msg', 'Bienvenido a nuestro sitio web');
		}
		return $next($request);
	}
}
