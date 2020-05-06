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
	public function handle($request, Closure $next)
	{
		if(! in_array(auth()->user()->rol, ['admin', 'vendedor'])){
			return redirect()->route('products.home')
				->with('msg', 'Solo los Administradores o vendedores pueden ingresar a esta sección');
		}

		return $next($request);
	}
}
