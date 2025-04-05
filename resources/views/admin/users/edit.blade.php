@extends('admin.app')
@section('content')
	<h3 class="text-center p-3"><small>Editar usuario</small></h3>

	<form action="{{route('admin.users.update', $user->id)}}" method="POST" class="p-3 form">
		@csrf
		<div class="row justify-content-md-center">
			<div class="col-md-6 bg-light p-3 border rounded">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Nombre del usuario">
				</div>
				<div class="form-group">
					<label for="nombre">Apellido</label>
					<input type="text" class="form-control" name="apellido" value="{{$user->apellido}}" placeholder="Apellido del usuario">
				</div>
				<div class="form-group">
					<label for="nombre">Documento</label>
					<input type="text" class="form-control" name="documento" value="{{$user->documento}}" placeholder="Documento del usuario">
				</div>
				<div class="form-group">
					<label for="nombre">Celular</label>
					<input type="text" class="form-control" name="celular" value="{{$user->celular}}" placeholder="Celular del usuario">
				</div>
				<div class="form-group">
					<label for="email">Correo</label>
					<input type="text" class="form-control" name="email" value="{{$user->email}}" placeholder="Correo del usuario">
				</div>
				<div class="form-group">
					<label for="rol">Rol</label>
					<select name="rol" class="form-control">
						@foreach ($user->roles() as $rol)
							@if($user->rol == $rol)
								<option value="{{$rol}}" selected>{{$rol}}</option>
							@else
								<option value="{{$rol}}">{{$rol}}</option>
							@endif
						@endforeach
					</select> 
				</div>
				<div class="form-group">
					<label for="Direccion">Dirección</label>
					<textarea name="Direccion" cols="30" rows="3" class="form-control">{{$user->Direccion}}</textarea>
				</div>
			
				<button class="btn btn-primary">Actualizar</button>
			</div>
		</div>
	</form>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ route('admin.products.index')}}" class="btn btn-outline-secondary btn-md ">regresar &nbsp;<i class="fa fa-return"></i> </a>
@endsection