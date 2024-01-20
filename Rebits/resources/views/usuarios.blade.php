<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<title>Usuarios</title>

  <style>
        body {
            background-color: #4aeadc;
        }
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
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
      </ul>
    </div>
  </div>
</nav>
<h1 class="text-center p-3">USUARIOS</h1>

<div class="p-5 table-responsive"> 
  <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalRegistrar"> Registrar nuevo usuario </button>
   <!-- Modal para registrar nuevo Usuario-->

          <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Editar datos de usuario</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('crearUsuario') }}" method="post">
                        @csrf
                        
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtNombreNew" >
                          <div id="emailHelp" class="form-text">Nombre del Usuario.</div>
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Apellido</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtApellidosNew" >
                          <div id="emailHelp" class="form-text">Apellido del usuario.</div>
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Correo</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtCorreoNew" >
                          <div id="emailHelp" class="form-text">Correo del usuario.</div>
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
                      </form>
                </div>
                
              </div>
            </div>
          </div>


  <table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Correo</th>
      <th scope="col">Edicion</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
     @foreach($usuarios as $item)
    <tr>
      <th>{{$item->id}}</th>
      <td>{{$item->nombre}}</td>
      <td>{{$item->apellidos}}</td>
      <td>{{$item->correo}}</td>
      <td> <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}"><i class="fa-solid fa-pen-to-square"></i> </a></td>


      <!-- Modal para editar Usuario-->

          <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Editar datos de usuario</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('editarUsuario') }}" method="post">
                        @csrf
                        <input type="hidden" name="usuario_id" value="{{ $item->id }}">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtNombre" value="{{$item->nombre}}">
                          <div id="emailHelp" class="form-text">Nombre del Usuario.</div>
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Apellido</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtApellidos" value="{{$item->apellidos}}">
                          <div id="emailHelp" class="form-text">Apellido del usuario.</div>
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Correo</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtCorreo" value="{{$item->correo}}">
                          <div id="emailHelp" class="form-text">Correo del usuario.</div>
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Modificar</button>
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