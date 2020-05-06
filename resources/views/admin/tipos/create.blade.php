@extends('admin.app')

@section('content')

<h3 class="text-center p-3">ADMIN. TIPOS DE MEDICAMENTOS <small>[Nuevo tipo]</small></h3>

<form action="{{route('admin.tipos.store')}}" method="POST" class="p-3 form">
	@csrf
		<div class="row justify-content-md-center">
			<div class="col-md-6 bg-light p-3 border rounded">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" name="Nombre"  placeholder="Digite nombre del tipo de medicamento" >
				</div>

				<button class="btn btn-primary">Crear</button>
				<a href="{{ route('admin.tipos.index') }}" class="btn btn-secondary">Regresar</a>
			</div>
		</div>	
</form>

@endsection