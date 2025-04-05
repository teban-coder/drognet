@extends('admin.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>

	<div class="container justify-content-between">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h3>
						Busqueda de facturas
						{{ Form::open(['route' => 'admin.pedidos.index', 'method' => 'GET', 'class' => 'form-inline pull-right'])}}
							<div class="form-group">
								{{ Form::date('fecha', null, ['class' => 'form-control', 'placeholder' => 'fecha'])}}
							</div> &nbsp;&nbsp;
							<div class="form-group">
								<button type="submit" class="btn btn-default">
									<span> <i class="fa fa-search"></i> </span>
								</button>
							</div>
						{{ Form::close()}}
					</h3>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="container-fluid">
	
		<h3 class="text-center p-3">Facturas</h3>

		<div class="container text-center">
			<div class="btn-group pb-3" role="group" aria-label="filtros">
				<a href="{{ route('admin.pedidos.index') }}" class="btn btn-sm btn-info">Todas</a>
				<a href="{{ route('admin.pedidos.index', 'web') }}" class="btn btn-sm btn-info">Web</a>
				<a href="{{ route('admin.pedidos.index', 'presencial') }}" class="btn btn-sm btn-info">Presenciales</a>
			</div>
		</div>
	
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<th>ID</th>
					<th>Fecha</th>
					<th>Cliente</th>
					<th>Vendedor</th>
					<th>Tipo de venta</th>
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
						<td>{{ $item->id }}</td>
						<td>{{ $item->fecha->format('d/m/Y') }}</td>
						@if ($item->tipo == 'web')
						@if ($item->user)
							<td>{{ $item->user->name}} {{ $item->user->apellido}}</td>
							@else
							<td>---</td>
                         @endif
							
						@else
							<td>---</td>
							<td>{{ $item->user->name}} {{ $item->user->apellido}}</td>
						@endif
						<td>{{ $item->tipo}}</td>
						<td>Contra entrega</td>
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
</body>
</html>


@endsection
