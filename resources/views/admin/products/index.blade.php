@extends('admin.app')
@section('content')
@section('title', 'Listado de productos')

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
					Busqueda de productos
					{{ Form::open(['route' => 'admin.products.index', 'method' => 'GET', 'class' => 'form-inline pull-right'])}}
						<div class="form-group">
							{{ Form::text('Laboratorio', null, ['class' => 'form-control', 'placeholder' => 'Laboratorio'])}}
						</div> &nbsp;&nbsp;
						<div class="form-group">
							{{ Form::text('Nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre'])}}
						</div> &nbsp;&nbsp;
						<div class="form-group">
							{{ Form::text('tip', null, ['class' => 'form-control', 'placeholder' => 'Categoria'])}}
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

	<h3 class="text-center p-3">Productos &nbsp;
		@if (Auth::user()->rol == 'admin')
			 <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
			    <i class="fa fa-plus" aria-hidden="true"></i>
			 </a>
		@else
				---
		@endif
	</h3>

	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Codigo</th>
				<th>TipoMedicamento</th>
				<th>Producto</th>
				<th>Imagen</th>
				<th>Laboratorio</th>
				<th>Stock</th>
				<th>Precio</th>
				<th>Lote</th>
				<th>FechaVencimiento</th>
				<th>Acciones</th>
			</thead> 
			<tbody>
				@forelse ($productos as $item)
				<tr>
					<td>{{$item->IdProducto}}</td>
					<td>{{$item->tip}}</td>
					<td>{{$item->Nombre}}</td>
					<td> <img src="{{ asset("images/productos/" . $item->Imagen)}}" width="100px" height="100px"> </td>
					<td>{{$item->Laboratorio}}</td>
					<td class="{{ $item->stock <= 0 ? 'text-danger' : 'text-success' }} text-center font-weight-bold">
						{{$item->stock}}
					</td>
					<td>{{$item->Precio}}</td>
					<td>{{$item->Lote}}</td>
					<td>{{$item->FechaVencimiento}}</td>
					<td class="text-center">
						@if (Auth::user()->rol == 'admin')
							<a href="{{ route('admin.products.edit', $item->IdProducto) }}" class="btn btn-warning">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a href="{{ route('admin.products.delete', $item->IdProducto) }}" class="btn btn-danger" 
								onclick="return confirm('¿Esta seguro de eliminar este registro?')">
								<i class="fa fa-times" aria-hidden="true"></i>
							</a>
						@else
							---
						@endif
					</td>
				</tr>
				@empty
					<p>No hay productos registrados</p>	
				@endforelse
			</tbody>
		</table>
	</div>

	{{$productos->links()}}

</div>
</body>
</html>

@endsection
