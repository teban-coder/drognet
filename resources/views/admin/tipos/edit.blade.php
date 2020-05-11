@extends('admin.app')

@section('content')
	<h3 class="text-center p-3"><small>Editar tipos de medicamentos</small></h3>

	<form action="{{route('admin.tipos.update', $tipo->IdTipoMedicamento)}}" method="POST" class="p-3 form">
		@csrf
		<div class="row justify-content-md-center">
			<div class="col-md-6 bg-light p-3 border rounded">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" name="Nombre" value="{{$tipo->Nombre}}" placeholder="Digite nombre del tipo de medicamento">
				</div>
			 
				<button class="btn btn-primary">Actualizar</button>
			
			</div>
		</div>
		
	</form>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ route('admin.products.index')}}" class="btn btn-outline-secondary btn-md ">regresar &nbsp;<i class="fa fa-return"></i> </a>
@endsection