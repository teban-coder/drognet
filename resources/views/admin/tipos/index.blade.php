@extends('admin.app')
@section('content')
<div class="container">

	<h3 class="text-center p-3">Tipos de medicamentos</h3>

	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Id</th>
				<th>Nombre</th>
				<th>Acciones</th>
			</thead> 
			<tbody>
				@forelse ($tipos as $item)
				<tr>
					<td>{{ $item->IdTipoMedicamento }}</td>
					<td>{{ $item->Nombre }}</td>
					

					<td class="text-center">
						@if (Auth::user()->rol == 'admin')
							<a href="{{ route('admin.tipos.create', $item->IdTipoMedicamento) }}" class="btn btn-primary">
								<i class="fa fa-plus" aria-hidden="true"></i>
							</a>
							<a href="{{ route('admin.tipos.edit', $item->IdTipoMedicamento) }}" class="btn btn-warning">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a href="{{ route('admin.tipos.delete', $item->IdTipoMedicamento) }}" class="btn btn-danger"
								onclick="return confirm('¿Esta seguro de eliminar este registro?')">
								<i class="fa fa-times" aria-hidden="true"></i>
							</a>
						@else
							---
						@endif
					</td>
				</tr>
				@empty
					<p>No hay tipos registrados</p>	
				@endforelse
			</tbody>
		</table>
	</div>

	{{$tipos->links()}}

</div>
@endsection

