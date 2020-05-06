@extends('admin.app')

@section('content')
	<h3 class="text-center p-3">ADMIN. PRODUCTOS <small>[Editar producto]</small></h3>

	<form action="{{route('admin.products.update', $productos->IdProducto)}}" method="POST" class="p-3 form" enctype="multipart/form-data">
		@csrf
		<div class="row justify-content-md-center">
			<div class="col-md-6 bg-light p-3 border rounded">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" name="Nombre" id="nombre" value="{{$productos->Nombre}}">
				</div>

				<div class="form-group">
					<select name="medicamento" id="" class="form-control">
						@forelse ($medicamentos as $item)
							@if($productos->IdTipoMedicamento==$item->IdTipoMedicamento)
								<option value="{{$item->IdTipoMedicamento}}" selected>{{$item->Nombre}}</option>
							@else
								<option value="{{$item->IdTipoMedicamento}}">{{$item->Nombre}}</option>
							@endif
						@empty
							---	
						@endforelse
					</select> 
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-4">
							<img src="{{ asset('images/productos/' . $productos->Imagen) }}" width="200">
						</div>
						<div class="col-md-8">
							<label for="nombre">Cambiar imagen</label>
							<input type="file" class="form-control" name="Imagen" value="{{ $productos->Imagen }}">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="nombre">Laboratorio</label>
					<input type="text" class="form-control" name="Laboratorio" id="nombre" value="{{$productos->Laboratorio}}">
				</div>

				<div class="form-group">
					<label for="nombre">Precio</label>
					<input type="number" class="form-control" name="Precio" id="nombre" value="{{$productos->Precio}}" >
				</div>

				<div class="form-group">
					<label for="nombre">Lote</label>
					<input type="text" class="form-control" name="Lote" id="nombre" value="{{$productos->Lote}}" >
				</div>

				<div class="form-group">
					<label for="nombre">FechaVencimiento</label>
					<input type="date" class="form-control" name="FechaVencimiento" id="nombre" value="{{$productos->FechaVencimiento}}" >
				</div>       
			 
				<button class="btn btn-primary">Actualizar</button>
				<a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Regresar</a>
			</div>
		</div>
		
	</form>
@endsection