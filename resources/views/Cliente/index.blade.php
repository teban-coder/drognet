@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card text-left">
          <div class="card-body">
            <table class="table">
                    <tbody>
                        <tr>
                        <h3 class="text-center p-3"> 
                            <strong>¡Bienvenido, {{Auth::user()->name}}!</strong>  <br>
                        </h3>
                        <p class="text-center p-3">Gestiona tu información y/o actualiza tus datos para mejorar tu experiencia.</p>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td> Apellido</td>
                            <td>{{ Auth::user()->apellido }}</td>
                        </tr>
                        <tr>
                            <td>Documento</td>
                            <td>{{ Auth::user()->documento }}</td>
                        </tr>
                        <tr>
                            <td>Celular</td>
                            <td>{{ Auth::user()->celular }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ Auth::user()->email}}</td>
                        </tr>
                        <tr>
                            <td>Direccion</td>
                            <td>{{ Auth::user()->Direccion}}</td>
                        </tr>
                         <tr>
                            <td></td>
                            <td>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
                                Editar
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edita el dato que nesecites</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <form action="{{Route('cliente.update', Auth::user()->id)}}" method="put">
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

                            </td>
                        </tr> 
                    </tbody>
                </table>
          </div>
        </div>

        </div>
    </div>
</div>
@endsection