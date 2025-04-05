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
						Busqueda de sugerencias
						{{ Form::open(['route' => 'admin.opinions.index', 'method' => 'GET', 'class' => 'form-inline pull-right'])}}
							<div class="form-group">
								{{ Form::text('tema', null, ['class' => 'form-control', 'placeholder' => 'tema'])}}
							</div>
								&nbsp;&nbsp;&nbsp;
							<div class="form-group">
								{{ Form::text('mensaje', null, ['class' => 'form-control', 'placeholder' => 'mensaje'])}}
							</div>
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
	<div class="container">

		<h3 class="text-center p-3">QUEJAS Y SUGERENCIAS</h3>
	
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<th>Id</th>
					<th>Fecha</th>
					<th>Tema</th>
					<th>Mensaje</th>
					<th>Acciones</th>
				</thead> 
				<tbody>
					@forelse ($opinions as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ $item->created_at->format('d/m/Y') }}</td>
						<td>{{ $item->tema }}</td>
						<td>{{ $item->mensaje }}</td>
						<td class="text-center">
							@if (Auth::user()->rol == 'admin')
								<a href="{{ route('admin.opinions.edit', $item->id) }}" class="btn btn-warning">
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>
								<a href="{{ route('admin.opinions.delete', $item->id) }}" class="btn btn-danger"
									onclick="return confirm('¿Esta seguro de eliminar este registro?')">
									<i class="fa fa-times" aria-hidden="true"></i>
								</a>
							@else
								---
							@endif
						</td>
					</tr>
					@empty
						<p>No hay quejas y/o sugerencias registradas</p>	
					@endforelse
				</tbody>
			</table>
		</div>
	
		{{$opinions->links()}}
	
	</div>
</body>
</html>

@endsection