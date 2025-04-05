<table class="table table-sm table-bordered">
	<tr>
		<th>Imagen</th>
		<th>Producto</th>
		<th>Precio</th>
		<th>Cantidad</th>
		<th>SubTotal</th>
		<th>Eliminar</th>
	</tr>
	@forelse ($carrito as $item)
		<tr>
			<td><img src="{{ asset("images/productos/" . $item->Imagen)}}" width="50"></td>
			<td>{{$item->Nombre}}</td>
			<td>${{ number_format($item->Precio,2)}}</td>
			<td> 
				<input type="number" 
				class="form-controlx text-center btn-update-item" 
				min="1"
				max="{{$item->stock}}"
				value="{{$item->cantidad}}"
				data-original-value="{{$item->cantidad}}"
				data-id="{{$item->IdProducto}}"
				data-href="{{ route('admin.carrito.update',$item->Lote) }}"
				onkeydown="return false">
			</td>
			<td>${{ number_format($item->Precio * $item->cantidad,2) }}</td>
			<td>
				<a href="{{ route('admin.carrito.delete',$item->Lote) }}" class="btn btn-sm btn-danger">
					<i class="fa fa-remove"></i>
				</a>
			</td> 
		</tr>
	@empty
		<tr>
			<td colspan="6">
				<p class="p-3">Elige en la columna de la izquierda los productos de la venta.</p>
			</td>
		</tr>
	@endforelse
</table>