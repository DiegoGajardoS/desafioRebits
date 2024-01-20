<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
	<title>Vehiculos</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/usuarios">Usuarios</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="p-5 table-responsive">
 <button class="my-button" data-bs-toggle="modal" data-bs-target="#modalRegistrar  "> Registrar nuevo vehículo </button>

  <!-- Modal para registrar nuevo vehiculo-->
          <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrarAuto" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="modalRegistrarAuto">Registrar nuevo vehículo</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('crearVehiculo') }}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="inputMarca" class="form-label">Marca</label>
                          <input type="text" class="form-control" id="inputMarca" aria-describedby="marcaHelp" name="txtMarcaNew" >
                          <div id="marcaHelp" class="form-text">Marca del vehículo.</div>
                        </div>

                        <div class="mb-3">
                          <label for="inputModelo" class="form-label">Modelo</label>
                          <input type="text" class="form-control" id="inputModelo" aria-describedby="modeloHelp" name="txtModeloNew">
                          <div id="modeloHelp" class="form-text">Modelo del vehículo.</div>
                        </div>

                        <div class="mb-3">
                          <label for="inputAnho" class="form-label">Año</label>
                          <input type="number" class="form-control" id="inputAnho" aria-describedby="anhoHelp" name="txtAnhoNew">
                          <div id="anhoHelp" class="form-text">Año del vehículo.</div>
                        </div>

                        <div class="mb-3">
                          <label for="dueno" class="form-label">Dueño</label>
                          <select class="form-select" id="dueno" name="txtdueno_idNew">
                              @foreach($usuarios as $usuario)
                                  <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{ $usuario->apellidos }}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="inputPrecio" class="form-label">Precio</label>
                          <input type="number" class="form-control" id="inputPrecio" aria-describedby="precioHelp" name="txtPrecioNew">
                          <div id="precioHelp" class="form-text">Precio del vehículo.</div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="my-button" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="my-button">Registrar</button>
                </div>
                      </form>
                </div>
                
              </div>
            </div>
          </div>
  <table class="table table-striped table-bordered table-hover my-table">
  <thead class="titulo-tabla">
    
    <tr>
      <th scope="col" class=" titulo-tabla ">#ID</th>
      <th scope="col" class=" titulo-tabla ">Marca</th>
      <th scope="col" class=" titulo-tabla ">Modelo</th>
      <th scope="col" class=" titulo-tabla ">Año</th>
      <th scope="col" class=" titulo-tabla ">Dueño(s)</th>
      <th scope="col" class=" titulo-tabla ">Precio</th>
      <th scope="col" class=" titulo-tabla ">Edición</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach($vehiculos as $item)
    <tr>
      <th>{{$item->id}}</th>
      <td>{{$item->marca}}</td>
      <td>{{$item->modelo}}</td>
      <td>{{$item->anho}}</td>
      <td> 
        <!-- boton modal Actual-->
        Actual <a href="#" class="my-button-small" style="margin-right: 20px;" data-bs-toggle="modal" data-bs-target="#modalUsuario{{ $item->id }}">
          <i class="fa-solid fa-user"></i> </a> 
        Registro histórico 
        @foreach($item->historicos as $index => $historico)

          <!-- Modal para dueños historicos-->
          <div class="modal fade" id="modalHistorico{{ $item->id }}_{{ $index }}" tabindex="-1" aria-labelledby="modalHistoricos" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="modalHistoricos">Datos históricos</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <h3>Dueños:</h3>
                    <ul>
                      @foreach($item->historicos as $historicoDetallado)
                            <li> {{ $historicoDetallado->usuario->nombre }} {{ $historicoDetallado->usuario->apellidos}} - Fecha: {{$historicoDetallado->created_at}}
                            </li>
                      @endforeach

                    </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="my-button" data-bs-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>z
          </div>
        @endforeach
        <!-- boton modal Historicos--> 
            <a href="" class="my-button-small" data-bs-toggle="modal" data-bs-target="#modalHistorico{{ $item->id }}_{{ $index }}">
                <i class="fa-solid fa-users"></i>
            </a>
      </td>
      <td>${{$item->precio}}</td>

      <!-- boton modal editar-->
      <td> <a href="" class="my-button-small" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}"><i class="fa-solid fa-pen-to-square"></i> </a>  </td>
          
          <!-- Modal para visualizar dueño actual-->

          <div class="modal fade" id="modalUsuario{{ $item->id }}" tabindex="-1" aria-labelledby="modalDuenho" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="modalDuenho">Datos del dueño del vehículo</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Nombre: {{ $item->dueno->nombre }}</p>
                  <p>Apellido: {{ $item->dueno->apellidos }}</p>
                  <p>Correo: {{ $item->dueno->correo }}</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="my-button" data-bs-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal para editar vehiculo-->

          <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="modalEditarVehiculo" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="modalEditarVehiculo">Editar datos del vehículo</h1>

                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('editarVehiculo') }}" method="post">
                        @csrf
                        <input type="hidden" name="vehiculo_id" value="{{ $item->id }}">
                        <div class="mb-3">
                          <label for="inputMarca" class="form-label">Marca</label>
                          <input type="text" class="form-control" id="inputMarca" aria-describedby="marcaHelp" name="txtMarca" value="{{$item->marca}}">
                          <div id="marcaHelp" class="form-text">Marca del vehículo.</div>
                        </div>

                        <div class="mb-3">
                          <label for="inputModelo" class="form-label">Modelo</label>
                          <input type="text" class="form-control" id="inputModelo" aria-describedby="modeloHelp" name="txtModelo" value="{{$item->modelo}}">
                          <div id="modeloHelp" class="form-text">Modelo del vehículo.</div>
                        </div>

                        <div class="mb-3">
                          <label for="inputAnho" class="form-label">Año</label>
                          <input type="number" class="form-control" id="inputAnho" aria-describedby="anhoHelp" name="txtAnho" value="{{$item->anho}}">
                          <div id="anhoHelp" class="form-text">Año del vehículo.</div>
                        </div>

                        <div class="mb-3">
                          <label for="dueno" class="form-label">Dueño</label>
                          <select class="form-select" id="dueno" name="txtdueno_id">
                              @foreach($usuarios as $usuario)
                                  <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{ $usuario->apellidos }}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="inputPrecio" class="form-label">Precio</label>
                          <input type="number" class="form-control" id="inputPrecio" aria-describedby="precioHelp" name="txtPrecio" value="{{$item->precio}}">
                          <div id="precioHelp" class="form-text">Precio del vehculo.</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="my-button" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="my-button">Modificar</button>
                        </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>       
    </tr>
    @endforeach
  </tbody>
</table>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/90f6459d75.js" crossorigin="anonymous"></script>
</body>
</html>