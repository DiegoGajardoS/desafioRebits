<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
	<title>Usuarios</title>


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
          <a class="nav-link" href="/vehiculos">Vehiculos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/historicos">Registro histórico</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="p-5 table-responsive"> 
  <button class="my-button" data-bs-toggle="modal" data-bs-target="#modalRegistrar"> Registrar nuevo usuario </button>
   <!-- Modal para registrar nuevo Usuario-->

          <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="editlabel">Editar datos de usuario</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('crearUsuario') }}" method="post">
                        @csrf
                        
                        <div class="mb-3">
                          <label for="inputNombre" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="inputNombre" aria-describedby="emailHelp" name="txtNombreNew" >
                          <div id="emailHelp" class="form-text">Nombre del Usuario.</div>
                        </div>

                        <div class="mb-3">
                          <label for="inputApellidos" class="form-label">Apellido</label>
                          <input type="text" class="form-control" id="inputApellidos" aria-describedby="emailHelp" name="txtApellidosNew" >
                          <div id="emailHelp" class="form-text">Apellido del usuario.</div>
                        </div>

                        <div class="mb-3">
                          <label for="InputEmail1" class="form-label">Correo</label>
                          <input type="text" class="form-control" id="InputEmail1" aria-describedby="emailHelp" name="txtCorreoNew" >
                          <div id="emailHelp" class="form-text">Correo del usuario.</div>
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
      <th scope="col" class=" titulo-tabla ">Nombre</th>
      <th scope="col" class=" titulo-tabla ">Apellido</th>
      <th scope="col" class=" titulo-tabla ">Correo</th>
      <th scope="col" class=" titulo-tabla ">Edicion</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
     @foreach($usuarios as $item)
    <tr>
      <th>{{$item->id}}</th>
      <td>{{$item->nombre}}</td>
      <td>{{$item->apellidos}}</td>
      <td>{{$item->correo}}</td>
      <td> <a href="" class="my-button-small" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}"><i class="fa-solid fa-pen-to-square"></i> </a></td>


      <!-- Modal para editar Usuario-->

          <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="modalEditar" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="modalEditar">Editar datos de usuario</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('editarUsuario') }}" method="post">
                        @csrf
                        <input type="hidden" name="usuario_id" value="{{ $item->id }}">
                        <div class="mb-3">
                          <label for="inputNombre" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="inputNombre" aria-describedby="nombreHelp" name="txtNombre" value="{{$item->nombre}}">
                          <div id="nombreHelp" class="form-text">Nombre del Usuario.</div>
                        </div>

                        <div class="mb-3">
                          <label for="inputApellidos" class="form-label">Apellido</label>
                          <input type="text" class="form-control" id="inputApellidos" aria-describedby="nombreHelp" name="txtApellidos" value="{{$item->apellidos}}">
                          <div id="nombreHelp" class="form-text">Apellido del usuario.</div>
                        </div>

                        <div class="mb-3">
                          <label for="InputEmail1" class="form-label">Correo</label>
                          <input type="text" class="form-control" id="InputEmail1" aria-describedby="emailHelp" name="txtCorreo" value="{{$item->correo}}">
                          <div id="emailHelp" class="form-text">Correo del usuario.</div>
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