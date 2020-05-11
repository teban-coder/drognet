@extends('layouts.app')
@section('content')
<div class="bg-light py-3">
	<div class="container">
	  <div class="row">
	  <div class="col-md-12 mb-0"><a href="{{ url('/') }}">Inicio</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contactenos</strong></div>
	  </div>
	</div>
  </div>
<div class="site-section">
	<div class="container">
		<h2 class="h3 mb-5 text-black">Ponerse en contacto</h2>

		@if (count($errors))
			<div class="alert alert-danger">
				@foreach ($errors->all() as $error)
					<ul>
						<li>{{ $error }}</li>
					</ul>
				@endforeach
			</div>
		@endif

		<form action="{{ route('opinion.store')}}" method="post">
			@csrf
			<div class="p-3 p-lg-5 border">
				<div class="form-group">
					<label for="tema">Tema</label> 

					<select name="tema" class="form-control">
						@foreach (\App\Opinion::temas() as $tema)
							<option value="{{$tema}}">{{$tema}}</option>
						@endforeach	
					</select> 
				</div>

				<div class="form-group">
					<label class="text-black">Mensaje</label>
					<textarea name="mensaje" cols="30" rows="7" class="form-control" required></textarea>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar Mensaje">
				</div>
			</div>
		</form>

		{{-- <a href="{{route('quejas.index')}}"><button  class="btn btn-primary">Listar</button></a> --}} 
	</div>
</div>
	
<div class="site-section bg-primary">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="text-white mb-4">Oficinas</h2>
			</div>
			<div class="col-lg-4">
				<div class="p-4 bg-white mb-3 rounded">
					<span class="d-block text-black h6 text-uppercase">Tunja</span>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="p-4 bg-white mb-3 rounded">
					<span class="d-block text-black h6 text-uppercase">Duitama</span>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="p-4 bg-white mb-3 rounded">
					<span class="d-block text-black h6 text-uppercase">Sogamoso</span>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection