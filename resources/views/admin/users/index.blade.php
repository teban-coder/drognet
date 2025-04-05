@extends('admin.app')
@section('content')
<div class="container">

	<h3 class="text-center p-3"> USUARIOS</h3>

	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Id</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Documento</th>
				<th>Celular</th>
				<th>Correo</th>
				<th>Rol</th>
				<th>Dirección</th>
				<th>Acciones</th>
			</thead> 
			<tbody>
				@forelse ($users as $item)
				<tr>
					<td>{{ $item->id }}</td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->apellido }}</td>
					<td>{{ $item->documento }}</td>
					<td>{{ $item->celular }}</td>
					<td>{{ $item->email }}</td>
					<td>{{ $item->rol }}</td>
					<td>{{ $item->Direccion }}</td>
					<td class="text-center">
						@if (Auth::user()->rol == 'admin')
							{{-- <a href="{{ route('admin.users.reset', $item->id) }}" class="btn btn-secondary">
								<i class="fa fa-key" aria-hidden="true"></i>
							</a>  --}}
							<a href="{{ route('admin.users.edit', $item->id) }}" class="btn btn-warning">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a href="{{ route('admin.users.delete', $item->id) }}" class="btn btn-danger"
								onclick="return confirm('¿Esta seguro de eliminar este registro?')">
								<i class="fa fa-times" aria-hidden="true"></i>
							</a>
						@else
							---
						@endif
					</td>
				</tr>
				@empty
					<p>No hay usuarios registrados</p>	
				@endforelse
			</tbody>
		</table>
	</div>

	{{$users->links()}}

</div>
@endsection