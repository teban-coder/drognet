@extends('admin.app')

@section('content')

<h3 class="text-center p-3">ADMIN. PRODUCTOS <small>[Nuevo producto]</small></h3>

<form action="{{route('admin.products.store')}}" method="POST"  enctype="multipart/form-data" class="p-3 form">
	@csrf
		<div class="row justify-content-md-center">
			<div class="col-md-6 bg-light p-3 border rounded">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" name="Nombre" id="nombre" >
				</div>

				<div class="form-group">
					<label for="nombre">Tipo de Medicamento</label><br> 

					<select name="tipomedicamento" id="" class="form-control">
						@forelse ($tipomedicamento as $item)
							<option value="{{$item->IdTipoMedicamento}}">{{$item->Nombre}}</option>
						@empty
							---	
						@endforelse	
					</select> 
				</div>

				<div class="form-group">
					<label for="nombre">Imagen</label>
					<input type="file" class="form-control" name="Imagen">
				</div>

				<div class="form-group">
					<label for="nombre">Laboratorio</label>
					<input type="text" class="form-control" name="Laboratorio" id="nombre" >
				</div>

				<div class="form-group">
					<label for="nombre">Precio</label>
					<input type="number" class="form-control" name="Precio" id="nombre" >
				</div>

				<div class="form-group">
					<label for="nombre">Lote</label>
					<input type="text" class="form-control" name="Lote" id="nombre" >
				</div>

				<div class="form-group">
					<label for="nombre">FechaVencimiento</label>
					<input type="date" class="form-control" name="FechaVencimiento" id="nombre" >
				</div>

				<button class="btn btn-primary">Crear</button>
				<a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Regresar</a>
			</div>
		</div>	
</form>

@endsection