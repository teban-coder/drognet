@extends('admin.app')

@section('content')
	<h3 class="text-center p-3">ADMIN. USUARIOS <small>[Resetear password]</small></h3>

	<form action="{{route('admin.users.store.password', $user->id)}}" method="POST" class="p-3 form">
		@csrf
		<div class="row justify-content-md-center">
			<div class="col-md-6 bg-light p-3 border rounded">
				<div class="form-group">
					<h4 class="">{{ $user->name }} ({{ $user->email }})</h4>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="password" placeholder="Ingrese el nuevo password...">
				</div>
			
				<button class="btn btn-primary">Guardar nuevo password</button>
				<a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Regresar</a>

				<p class="alert alert-danger mt-3"><strong>Importante:</strong> el password del usuario no se puede editar solo resetear, si lo hace notifique al usuario su nuevo password.</p>
			</div>
		</div>
	</form>
@endsection