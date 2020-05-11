@extends('admin.app')
@section('content')
<div class="container">

	<h3 class="text-center p-3">DETALLE DEL PEDIDO: {{ $pedido->id }}</h3>

	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Fecha</th>
				<th>Cliente</th>
				<th>Tipo de pago</th>
				<th>Subtotal</th>
				<th>Envío</th>
				<th>Total</th>
				<th>Referencia</th>
				<th>Direccion</th>
			</thead> 
			<tbody>
				<tr>
					<td>{{ $pedido->fecha->format('d/m/Y') }}</td>
					<td>{{ $pedido->user->name }}</td>
					<td>Contra entrega</td>
					<td>{{ number_format($pedido->subtotal, 2) }}</td>
					<td>{{ number_format($pedido->envio, 2) }}</td>
					<td>{{ number_format($pedido->subtotal + $pedido->envio, 2) }}</td>
					<td>{{ $pedido->referencia }}</td>
					<td>{{ $pedido->user->Direccion }}</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="table-responsive">
		<table class="table site-block-order-table mb-5 table-striped table-bordered">
			<tr>
				<th>Producto</th>
				<th>Imagen</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Total</th>	
			</tr>
			@foreach ($items as $item)
				<tr>
			 		<td>{{ $item->producto->Nombre }}</td>
			 		<td class="text-center"><img src="{{ asset('images/productos/' . $item->producto->Imagen) }}" width="120"></td>
					<td>{{ number_format($item->precio, 2) }} </td>
					<td>{{ $item->cantidad }} </td>
					<td>{{ number_format($item->precio * $item->cantidad, 2) }} </td>
				</tr>
			@endforeach
		</table>
	</div>

	<a href="{{ route('admin.pedidos.index') }}" class="btn btn-secondary">Regresar</a>

</div>
@endsection
