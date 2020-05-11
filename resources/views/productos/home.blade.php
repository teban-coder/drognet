@extends('layouts.app')
@section('content')
<div class="container">
	<div class="bg-light py-3">
		<div class="container">
		  <div class="row">
		  <div class="col-md-12 mb-0"><a href="{{ url('/') }}">Inicio</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Tienda</strong></div>
		  </div>
		</div>
	  </div>	
	<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
		<h1 class="display-4 mt-4">Lista de Productos</h1>
		<p class="lead">Selecciona uno de nuestros productos </p>
	</div>
	
	<div class="card-columns" id="lista-productos">
		@forelse ($productos as $item)
			<div class="card mb-2 shadow-sm">
				<div class="card-header">
					<h4 class="my-0 font-weight-bold">{{$item->Nombre}}</h4>
				</div>
				<div class="card-body">
					<img src="{{ asset("images/productos/$item->Imagen") }}" class= "card-img-top" style="width: 320px;">
					<h1 class="card-title pricing-card-title precio">$ <span class="">{{$item->Precio}}</span></h1>
					<ul class="list-unstyled mt-3 mb-4">
						<li><b>Laboratorio</b></li>
						<li>{{$item->Laboratorio}}</li>
					</ul>
					<p class="text-center">
						<a href="{{route('products.detail',$item->IdProducto)}}" class="btn btn-primary agregar-carrito" >
							Detalle
						</a>	
					</p>
				</div>
			</div>
		@empty
			 
		@endforelse
	</div>
		
	{{$productos->links()}}
		
</div>
@endsection
