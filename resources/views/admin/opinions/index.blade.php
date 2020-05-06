@extends('admin.app')
@section('content')
<div class="container">

	<h3 class="text-center p-3">ADMIN. QUEJAS Y SUGERENCIAS</h3>

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
@endsection