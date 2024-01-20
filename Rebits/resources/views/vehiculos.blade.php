<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
	<title></title>
</head>
<body>

<div class="p-5 table-responsive">
  <h1 class="text-center p-3">VEHICULOS</h1>
  <table class="table table-striped table-bordered table-hover">
  <thead class="titulo-tabla">
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th scope="col">Año</th>
      <th scope="col">Dueño</th>
      <th scope="col">Precio</th>
      <th scope="col">Edición</th>
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
        Actual <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalUsuario{{ $item->id }}">
          <i class="fa-solid fa-user"></i> </a> 
        Historico 
        @foreach($item->historicos as $index => $historico)

            <!-- Modal para historicos-->
          <div class="modal fade" id="modalHistorico{{ $item->id }}_{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Datos historicos</h1>
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
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>z
          </div>
        @endforeach <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalHistorico{{ $item->id }}_{{ $index }}">
                <i class="fa-solid fa-users"></i>
            </a>
      </td>
      <td>${{$item->precio}}</td>
      <td> <a href="" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i> </a>  </td>
          
          <!-- Modal para visualizar dueño-->

          <div class="modal fade" id="modalUsuario{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Datos de usuario dueño del vehiculo</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Nombre: {{ $item->dueno->nombre }}</p>
                  <p>Apellido: {{ $item->dueno->apellidos }}</p>
                  <p>Correo: {{ $item->dueno->correo }}</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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