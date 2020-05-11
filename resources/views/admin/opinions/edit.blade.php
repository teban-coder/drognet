@extends('admin.app')

@section('content')
	<h3 class="text-center p-3"><small>Editar</small></h3>

	<form action="{{route('admin.opinions.update', $opinion->id)}}" method="POST" class="p-3 form">
		@csrf
		<div class="row justify-content-md-center">
			<div class="col-md-6 bg-light p-3 border rounded">
				<div class="form-group">
					<label for="tema">Tema</label>
					<select name="tema" class="form-control">
						@foreach (\App\Opinion::temas() as $tema)
							@if($opinion->tema == $tema)
								<option value="{{$tema}}" selected>{{$tema}}</option>
							@else
								<option value="{{$tema}}">{{$tema}}</option>
							@endif
						@endforeach
					</select> 
				</div>
				<div class="form-group">
					<label for="mensaje">Mensaje</label>
					<textarea name="mensaje" cols="30" rows="3" class="form-control">{{$opinion->mensaje}}</textarea>
				</div>
			
				<button class="btn btn-primary">Actualizar</button>
			</div>
		</div>
	</form>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ route('admin.products.index')}}" class="btn btn-outline-secondary btn-md ">regresar &nbsp;<i class="fa fa-return"></i> </a>
@endsection