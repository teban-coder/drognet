@extends('layouts.app')
@section('content')
<div class="bg-light py-3">
  <div class="container">
    <div class="row">
    <div class="col-md-12 mb-0"><a href="{{ url('/') }}">Inicio</a> <span class="mx-2 mb-0">/&nbsp;<a href="{{ route('products.home') }}">Tienda</a>&nbsp; /</span> <strong class="text-black">Carrito</strong></div>
    </div>
  </div>
  </div>
<div class="site-section">
  <div class="container justify-content-center">
    <div class="">
      @if (count($carrito))
        
        <div class="site-blocks-table">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="product-thumbnail">Imagen</th>
                <th class="product-name">Producto</th>
                <th class="product-price">Precio</th>
                <th class="product-quantity">Cantidad</th>
                <th class="product-total">SubTotal</th>
                <th class="product-remove">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($carrito as $item)
              <tr>
               <td class="product-thumbnail"><img src="{{ asset("images/productos/" . $item->Imagen)}}" width="100px" height="100px"></td>
              <td class="product-name">{{$item->Nombre}}</td>
              <td>${{ number_format($item->Precio,2)}}</td>
              <td> 
              <input type="number" 
                class="form-controlx text-center" 
                min="1"
                max="100"
                value="{{$item->cantidad}}"
                id="productos_{{$item->IdProducto}}">
                
              
              <a 
               class="btn btn-outline-warning btn-update-item"
               data-href="{{ route('carrito.update',$item->Lote) }}"
                data-id="{{$item->IdProducto}}"
                >
                <i class="fa fa-refresh"></i> </a>
                      &nbsp;  &nbsp;  &nbsp;
            </td>
              <td>${{ number_format($item->Precio * $item->cantidad,2) }}</td>
              <td><a href="{{ route('carrito.delete',$item->Lote) }}" class="btn btn-outline-danger"><i class="fa fa-remove"></i></a></td> 
              </tr>
              
              @empty
              
              @endforelse
            </tbody>
          </table>
        </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="row mb-5">
          <div class="col-md-6">
          <a href="{{route('products.home')}}" class="btn btn-outline-primary btn-md btn-block">Continuar comprando</a>
          </div> <br> <br>
          <div class="col-md-6">
          <a href="{{ route('carrito.eliminar')}}" class="btn btn-outline-danger btn-md btn-block">Vaciar carrito &nbsp;<i class="fa fa-trash"></i> </a>
            </div>
        </div>
      </div>
      <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Total del carrito</h3>
              </div>
            </div>
           
            <div class="row mb-5">
              <div class="col-md-6">
                <span class="text-black">SubTotal</span>
              </div>
              <div class="col-md-6 text-right">
              <strong class="text-black">${{$total}}</strong>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
              <a  href="{{ route('factura.factura')}}" class="btn btn-primary btn-lg btn-block" onclick="window.location='checkout.html'">Procesar mi compra</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @else 
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <span class="icon-exclamation-circle display-1 text-dark"></span>
          <h2 class="display-3 text-black">¡Ooops!</h2>
          <p class="lead mb-5">No hay productos en el carrito.</p>
        <p><a href="{{route('products.home')}}" class="btn btn-md height-auto px-4 py-3 btn-primary">Ir a la tienda</a></p>
        </div>
      </div>
    </div>
  </div>

  @endif
</div>

@section('scripts')
<script>
  $(document).ready(function(){

    $(".btn-update-item").on('click', function(e){
      e.preventDefault();
    
     var IdProducto = $(this).data('id');
     var href = $(this).data('href');
     var cantidad = $("#productos_" + IdProducto).val();

     window.location.href = href + "/" + cantidad;
     
     });

  });

</script>
@endsection

  @endsection