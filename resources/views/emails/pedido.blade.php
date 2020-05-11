<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Pedido realizado</title>
	<style>
		body{
			font-family: Georgia, Helvetica;
			color: #444;
		}
		.container{
			width: 600px;
			margin: 10px auto;
			background-color: #fafafa;
			box-shadow: 1px 1px 3px #888;
			border-radius: 8px;
			padding: 5px;
		}
		table{
			border-collapse: collapse;
			width: 90%;
		}

		table, th, td{
			border: 1px solid #ddd;
		}
	</style>
</head>
<body>
	<div class="container" align="center">
		<h2>Datos del Pedido</h2><hr>

		<h3>Cliente</h3>
		<table>
			<tr><td>Nombre</td><td>{{ \Auth::user()->name }}</td></tr>
			<tr><td>Correo</td><td>{{ \Auth::user()->email }}</td></tr>
			<tr><td>Dirección</td><td>{{ \Auth::user()->Direccion }}</td></tr>
		</table>
		
		<h3>Productos comprados</h3>
		<table>
			<tr>
				<th>Producto</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Subtotal</th>
			</tr>
			@foreach($carrito as $item)
				<tr>
					<td>{{ $item->Nombre }}</td>
					<td>${{ number_format($item->Precio,2) }}</td>
					<td>{{ $item->cantidad }}</td>
					<td>${{ number_format($item->Precio * $item->cantidad,2) }}</td>
				</tr>
			@endforeach
		</table>

		<p><b>Subtotal:</b> ${{ number_format($pedido->subtotal,2) }}</p>
		<p><b>Envio:</b> ${{ number_format($pedido->envio,2) }}</p>
		<p><b>Total a pagar:</b> ${{ number_format($pedido->subtotal + $pedido->envio,2) }}</p><hr>

		<p>Fecha del pedido: {{ $pedido->fecha->format('d/m/Y') }}</p>

		<h3>Importante:</h3>
		<ol>
			<li>Su pedido se paga en efectivo al recibir los productos.</li>
			<li>El tiempo de entrega sera dentro de las próximas 12 horas.</li>
			<li>Al recibir el pedido debe mostrar su Número de referencia: <b>{{ $pedido->referencia }}</b></li>
		</ol>
		
		<p><em>¡Gracias por elegirnos!</em></p>
	</div>
</body>
</html>