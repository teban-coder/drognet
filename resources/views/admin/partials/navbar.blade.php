<nav class="navbar navbar-expand-lg navbar-light border-bottom">
	<div class="logo">
		<div class="site-logo">
		  <a href="{{ url('/') }}" class="js-logo-clone">Drognet</a>
		</div>
	  </div>
	  &nbsp;&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.products.index') }}">Productos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin.pedidos.index') }}">Facturas</a>
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
			<li class="nav-item">
				<a class="nav-link bg-primary rounded" href="{{ route('admin.carrito.index') }}">
					<i class="fa fa-plus"></i> Venta
				</a>
			</li>
			&nbsp;&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	

			<li class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
				<strong>{{ Auth::user()->name }}</strong>	 &nbsp; <strong>({{ Auth::user()->rol }})</strong> <span class="caret"></span>
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
<script>
	$(document).ready(function() {
	  $(".msg").slideDown( "slow");
	});
  </script>