@extends('admin.app')

@section('content')

<h3 class="text-center p-3"><small>Crear un nuevo tipo de medicamento</small></h3>

@if (count($errors))
	<div class="alert alert-danger">
		@foreach ($errors->all() as $error)
			<ul>
			<li>{{ $error }}</li>
			</ul>
		@endforeach
	</div>
@endif

<form action="{{route('admin.tipos.store')}}" method="POST" class="p-3 form">
	@csrf
		<div class="row justify-content-md-center">
			<div class="col-md-6 bg-light p-3 border rounded">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" name="Nombre"  placeholder="Digite nombre del tipo de medicamento" >
				</div>

				<button class="btn btn-primary">Crear</button>
			</div>
		</div>	
</form>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ route('admin.products.index')}}" class="btn btn-outline-secondary btn-md ">regresar &nbsp;<i class="fa fa-return"></i> </a>
@endsection