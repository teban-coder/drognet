@extends('admin.app')

@section('content')

<h3 class="text-center p-3"><small>Crear Nuevo producto</small></h3>

 @if(count($errors))
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li class="fa fa-danger">{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif 

<form action="{{route('admin.products.store')}}" method="POST"  enctype="multipart/form-data" >
	@csrf
		<div class="row justify-content-md-center">
			<div class="col-md-6 bg-light  border rounded">
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
				<div class="row">
					<div class="col-md-6">
						<div class="row mb-5">
					 		 <div class="col-md-6">
					 			 <button class="btn btn-outline-primary btn-md btn-block">Crear</button>
					 		 </div>
						</div>
				  </div>
				</div>		
			</div>

		</div>	
</form>
<br> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="{{ route('admin.products.index')}}" class="btn btn-outline-secondary btn-md ">regresar &nbsp;<i class="fa fa-return"></i> </a>




@endsection