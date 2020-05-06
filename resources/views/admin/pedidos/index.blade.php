@extends('admin.app')
@section('content')
<div class="container">

	<h3 class="text-center p-3">ADMIN. PEDIDOS</h3>

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
				<th>Acciones</th>
			</thead> 
			<tbody>
				@forelse ($pedidos as $item)
				<tr>
					<td>{{ $item->fecha->format('d/m/Y') }}</td>
					<td>{{ $item->user->name }}</td>
					<td>Contra entrega</td>
					{{-- <td>{{ $item->tipopago_id }}</td> --}}
					<td>{{ number_format($item->subtotal, 2) }}</td>
					<td>{{ number_format($item->envio, 2) }}</td>
					<td>{{ number_format($item->subtotal + $item->envio, 2) }}</td>
					<td>{{ $item->referencia }}</td>
					<td>
						<a href="{{ route('admin.pedidos.detail', $item->id) }}" class="btn btn-info">
							<i class="fa fa-eye"></i>
						</a>
						@if (Auth::user()->rol == 'admin')
							<a href="{{ route('admin.pedidos.delete', $item->id) }}" class="btn btn-danger"
								onclick="return confirm('¿Esta seguro de eliminar este registro?')">
								<i class="fa fa-times" aria-hidden="true"></i>
							</a>
						@endif
					</td>
				</tr>
				@empty
					<p>No hay pedidos registrados</p>	
				@endforelse
			</tbody>
		</table>
	</div>

	{{$pedidos->links()}}

</div>
@endsection
