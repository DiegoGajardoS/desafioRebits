<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
	<title>Históricos</title>
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
        <li class="nav-item">
          <a class="nav-link" href="/vehiculos">Vehículos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="p-5 table-responsive">
  <table class="table table-striped table-bordered table-hover my-table">
  <thead class="titulo-tabla">
    <tr>
      <th scope="col" class=" titulo-tabla ">#ID</th>
      <th scope="col" class=" titulo-tabla ">Vehículo</th>
      <th scope="col" class=" titulo-tabla ">Dueño</th>
      <th scope="col" class=" titulo-tabla ">Fecha de adquisición</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach($historicos as $item)
    <tr>
      <th>{{$item->id}}</th>
      <td> 
        <!-- boton modal Vehiculo-->
        Datos del vehículo <a href="#" class="my-button-small" data-bs-toggle="modal" data-bs-target="#modalVehiculo{{ $item->id }}">
          <i class="fa-solid fa-car"></i> </a> 
      </td>
      <td> 
        <!-- boton modal Actual-->
        Datos del dueño del vehículo <a href="#" class="my-button-small" data-bs-toggle="modal" data-bs-target="#modalUsuario{{ $item->id }}">
          <i class="fa-solid fa-user"></i> </a> 
      </td>
      <td>{{$item->created_at}}</td>
      	  <!-- Modal para visualizar vehiculo-->
          <div class="modal fade" id="modalVehiculo{{ $item->id }}" tabindex="-1" aria-labelledby="modalVehiculo" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="modalVehiculo">Datos del vehículo</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Marca: {{ $item->vehiculo->marca }}</p>
                  <p>Modelo: {{ $item->vehiculo->modelo }}</p>
                  <p>Año: {{ $item->vehiculo->anho }}</p>
                  <p>Precio: {{ $item->vehiculo->precio }}</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="my-button" data-bs-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div> 
          <!-- Modal para visualizar dueño actual-->
          <div class="modal fade" id="modalUsuario{{ $item->id }}" tabindex="-1" aria-labelledby="modalDuenho" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="modalDuenho">Datos del dueño del vehículo</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Nombre: {{ $item->usuario->nombre }}</p>
                  <p>Apellido: {{ $item->usuario->apellidos }}</p>
                  <p>Correo: {{ $item->usuario->correo }}</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="my-button" data-bs-dismiss="modal">Cerrar</button>
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