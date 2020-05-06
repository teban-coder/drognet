<nav class="navbar navbar-expand-lg navbar-light border-bottom">
	<a class="navbar-brand" href="{{ route('admin.products.index') }}">DROGNET</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
					<i class="fa fa-cogs" aria-hidden="true"></i> Dashboard
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ url('/') }}">Página</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.products.index') }}">Productos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.pedidos.index') }}">Pedidos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.tipos.index') }}">Tipos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.opinions.index') }}">Quejas/Sugerencias</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.users.index') }}">Usuarios</a>
			</li>
			<li class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
					{{ Auth::user()->name }} <small>({{ Auth::user()->rol }})</small> <span class="caret"></span>
				</a>

				<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
					<li>
						<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault();
									 document.getElementById('logout-form').submit();">
							Salir
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
				</ul>
			</li>
			
		</ul>
	</div>
</nav>