@extends('layouts.app')
@section('content')
<div class="site-section">
  <div class="container" id="lista-productos">
      <div class="row">
          <div class="col-md-5 mr-auto">
              <div class="border text-center">
              <img class="card-img-top" src="{{ asset("images/productos/" . $productos[0]->Imagen)}}" asp-append-version="true" width="300px" height="300px">
              </div>
          </div>
          <div class="col-md-6">
          <h4 class="text-black">
              {{$productos[0]->Nombre}}
              @if ($productos[0]->stock <= 0)
                <span class="badge badge-danger">Agotado</span>
              @else
                <span class="badge badge-success">Disponibles: {{ $productos[0]->stock }}</span>
              @endif
         </h4>
          <h1 class="precio"><p><span class="text-primary">${{$productos[0]->Precio}}</span></p></h1>
          @if ($productos[0]->stock <= 0)
            <p class="alert alert-danger">
                <i class="fas fa-info-circle"></i> Lo sentimos este producto se encuentra agotado.
            </p>
          @else
              <a href="{{route('carrito.create',$productos[0]->Lote)}}" class="btn btn-sm height-auto px-4 py-3 btn-primary" data-id="1">
                Añadir al carrito
            </a>
          @endif
               <div class="mt-5">
                  <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                             aria-controls="pills-home" aria-selected="true">Especificaciones</a>
                      </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                       <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                          <table class="table custom-table">
                              <tbody>
                                  <tr>
                                      <td>Fecha de vencimiento</td>
                                  <td class="bg-light">{{$productos[0]->FechaVencimiento}}</td>
                                  </tr>
                                  <tr>
                                      <td>Tipo de medicamento</td>
                                  <td class="bg-light">{{$productos[0]->tip}}</td>
                                  </tr>
                                  <tr>
                                      <td>Lote</td>
                                  <td class="bg-light">{{$productos[0]->Lote}}</td>
                                  </tr>
                                  <tr>
                                      <td>Laboratorio</td>
                                  <td class="bg-light">{{$productos[0]->Laboratorio}}</td>
                                  </tr>
                              </tbody>
                          </table>

                      </div>

                  </div>
              </div>


          </div>
      </div>
  </div>
  <br />

</div>
<center>
  <div>
  <p><a href="{{route('products.home')}}" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Volver a la lista</a></p>

</div>
</center>
@endsection