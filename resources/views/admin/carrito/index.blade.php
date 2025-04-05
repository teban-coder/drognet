@extends('admin.app')
@section('content')
<div class="container-fluid bg-light pb-3">

	<h3 class="text-center p-3"><i class="fa fa-shopping-cart" aria-hidden="true"></i> NUEVA VENTA</h3>

	<div class="row">
		<div class="col-lg-3">
			<div class="card card-body">
				<h4>Elegir productos:</h4>

				<table class="table table-sm">
				@forelse ($productos as $producto)
					<tr>
						<td>
							<span class="text-uppercase">{{ $producto->Nombre }}</span> 
							<span class="badge badge-light">Stock: {{ $producto->stock }}</span>
						</td>
						<td>${{ number_format($producto->Precio, 2) }}</td>
						<td>
							<a href="{{ route('admin.carrito.create', $producto->Lote) }}" class="btn btn-warning btn-sm">
								<i class="fa fa-plus" aria-hidden="true"></i>
							</a>
						</td>
					</tr>
				@empty
					---
				@endforelse    
				</table>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card card-body">
				@include('admin.carrito.partials.carrito')
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card card-body">
				<h4>Datos de la venta:</h4>

				<p><b>Fecha:</b> {{ date('d/m/Y') }}</p>
				<p><b>Vendedor:</b> {{ auth()->user()->name }} {{ auth()->user()->apellido }}</p>
				<h3 class="alert alert-warning text-center">
					Total a pagar: $ {{ number_format($total, 2) }}
				</h3>
				@if ($total > 0)
					<hr>
					<p class="text-center">
						<a href="{{ route('admin.pedidos.procesar')}}" class="btn btn-success">
							<i class="fa fa-check-circle" aria-hidden="true"></i> Completar la venta
						</a>
						<a href="{{ route('admin.carrito.eliminar')}}" class="btn btn-secondary">
							Cancelar venta
						</a>
					</p>	
				@endif
			</div>
		</div>
	</div>

	<p class="text-center">
		<a href="{{ route('admin.pedidos.index') }}" class="btn btn-secondary">Regresar</a>
	</p>

</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function(){
		$(".btn-update-item").on('click', function(e){
			e.preventDefault();
		
			var IdProducto = $(this).data('id');
			var href = $(this).data('href');
			var originalValue = $(this).data('original-value');
			var cantidad = $(this).val();
			var max = $(this).attr('max');
			var min = $(this).attr('min');

			if(cantidad == originalValue) return;

			window.location.href = href + "/" + cantidad;
		 });
	});

</script>
@endsection