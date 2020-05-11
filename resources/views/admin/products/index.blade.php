@extends('admin.app')
@section('content')
<div class="container">

	<h3 class="text-center p-3">Productos</h3>

	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Codigo</th>
				<th>TipoMedicamento</th>
				<th>Producto</th>
				<th>Imagen</th>
				<th>Laboratorio</th>
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
					<td>{{$item->Precio}}</td>
					<td>{{$item->Lote}}</td>
					<td>{{$item->FechaVencimiento}}</td>
					<td class="text-center">
						@if (Auth::user()->rol == 'admin')
						<a href="{{ route('admin.products.create', $item->IdProducto) }}" class="btn btn-primary">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</a>
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
@endsection
