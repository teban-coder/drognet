@extends('layouts.app')

@section('content')
<div class="bg-light py-3">
  <div class="container">
    <div class="row">
    <div class="col-md-12 mb-0"><a href="{{ url('/') }}">Inicio</a> <span class="mx-2 mb-0">/&nbsp;<a href="{{ route('products.home') }}">Tienda</a>&nbsp;/ &nbsp;<a href="{{ route('carrito.carrito') }}">Carrito &nbsp;</a>/</span> <strong class="text-black">Facturación</strong></div>
    </div>
  </div>
  </div>
<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
          <h2 class="h3 mb-3 text-black">Datos del cliente</h2>
          <div class="p-3 p-lg-5 border">
         
            <div class="form-group row mb-5">
             <div class="table-responsive">
               <table class="table table-striped table-hover table-bordered">
                 <tr>
                   <td>
                      <strong>Nombre:</strong> 
                   </td>
                   <td>
                     {{ auth::user()->name }}
                   </td>
                 </tr>
                 <tr>
                  <td>
                     <strong>Apellido :</strong> 
                  </td>
                  <td>
                    {{ auth::user()->apellido }}
                  </td>
                </tr>
                <tr>
                  <td>
                     <strong>Documento :</strong> 
                  </td>
                  <td>
                    {{ auth::user()->documento }}
                  </td>
                </tr>
                <tr>
                  <td>
                     <strong>Celular :</strong> 
                  </td>
                  <td>
                    {{ auth::user()->celular }}
                  </td>
                </tr>
                 <tr>
                  <td>
                     <strong>Email:</strong> 
                  </td>
                  <td>
                    {{ auth::user()->email }}
                  </td>
                </tr>
                <tr>
                  <td>
                     <strong>Dirección :</strong> 
                  </td>
                  <td>
                    {{ auth::user()->Direccion }}
                  </td>
                </tr>
                 
               </table>
               <div class="card card-body">
                <h3><strong>Nota:</strong> </h3>
                 <li>Si desea editar algun dato de click en el siguiente boton.</li> <hr>
 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
  Editar
  </button>
  <!-- Modal -->
  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Edicion Datos Personales</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
              </div>
              <form action="{{Route('factura.update', Auth::user()->id)}}" method="put">
                  @csrf
                  <div class="modal-body">
                      <table class="table table-hover">
                          <tbody>
                              <tr>
                                  <td> <label for="name">Nombre</label> </td>
                                  <td> <input class="form-control" type="text" name="name" id="name" value="{{Auth::user()->name}}"> </td>
                              </tr>
                              <tr>
                                  <td> <label for="last_name">Apellido</label> </td>
                                  <td> <input class="form-control" type="text" name="apellido" id="last_name" value="{{Auth::user()->apellido}}"> </td>
                              </tr>
                              <tr>
                                  <td> <label for="email">Documento</label> </td>
                                  <td> <input class="form-control" type="text" name="documento" id="email" value="{{Auth::user()->documento}}"> </td>
                              </tr>
                              <tr>
                                  <td> <label for="NumCelular">Celular</label> </td>
                                  <td> <input class="form-control" type="text" name="celular" id="NumCelular" value="{{Auth::user()->celular}}"> </td>
                              </tr>
                              <tr>
                                  <td> <label for="NumCelular">Email</label> </td>
                                  <td> <input class="form-control" type="email" name="email" id="NumCelular" value="{{Auth::user()->email}}"> </td>
                              </tr>
                              <tr>
                                  <td> <label for="NumCelular">Direccion</label> </td>
                                  <td> <input class="form-control" type="text" name="Direccion" id="NumCelular" value="{{Auth::user()->Direccion}}"> </td>
                              </tr>
                          </tbody>
                      </table>
                      <div class="modal-footer">
                          <button class="btn btn-primary">Guardar</button>
                          <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      </div>
              </div>
              </form>
          </div>
      </div>
  </div>                 
               </div>
             </div>
             
            </div>

          </div>
                 <hr>
          
          <div class="col-md-6 mb-3 mb-md-0">
          <a href="{{route('carrito.carrito')}}" class="btn btn-outline-dark btn-md btn-block"> <i class="fa fa-undo"></i> &nbsp; Regresar</a>
          </div>

        </div>
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">Su pedido</h2>
              <div class="p-3 p-lg-5 border">
                <table class="table site-block-order-table mb-5 table-striped table-hover table-bordered">
                  <thead>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                  </thead>
                  <tbody>
                    @foreach ($carrito as $item)
                        <tr>
                     <td>{{$item->Nombre}}</td>
                      <td>{{$item->Precio}} </td>
                      <td>{{$item->cantidad}} </td>
                      <td>{{$item->Precio * $item->cantidad}} </td>
                    </tr>
                    @endforeach 
                    <tr>
                      <td class="text-black font-weight-bold"><strong> Total:</strong></td>
                    <td class="text-black font-weight-bold"><strong>${{$total}}</strong></td>
                    </tr>
                  </tbody>
                </table>
  
                {{-- <div class="form-group">
                  <label for="c_diff_country" class="text-black">Seleccione un tipo de pago<span class="text-danger">*</span></label>
                  <select id="c_diff_country" class="form-control">
                    <option value="1">Efectivo</option>
                    <option value="2">Contra Entrega</option>
                
                  </select>
                </div> --}}
  
  
                <div class="mb-5">
                 
                {{-- <a  href="{{route('payment.payment')}}" class="btn btn-outline-warning btn-md btn-block disabled">Pagar con PayPal &nbsp; <i class="fa fa-paypal fa-2x"></i></a>
                          </div> --}}
  
                <div class="form-group">
                  <a href="{{ route('pedido.procesar') }}" class="btn btn-primary btn-lg btn-block">Realizar su pedido</a>
                </div>

                <div class="card card-body">
                 <h3><strong>Importante:</strong> </h3>
                  <ol>
                    <li>El pedido se paga en efectivo al recibir los productos.</li>
                    <li>El tiempo de entrega sera dentro de las próximas 12 horas.</li>
                    <li>Al recibir el pedido debe mostrar su Número de referencia, mismo que le llegara a su correo.</b></li>
                  </ol>
                </div>
  
              </div>
            </div>
          </div>
  
        </div>
      </div>
      <!-- </form> -->
    </div>
  </div>
  
@endsection