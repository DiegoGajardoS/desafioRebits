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
        <a href="" class="btn btn-info btn-sm"><i class="fa-solid fa-user"></i> </a> 
        <a href="" class="btn btn-info btn-sm"><i class="fa-solid fa-users"></i> </a> </td>
      <td>${{$item->precio}}</td>
    </tr>

    @endforeach
    
  </tbody>
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/90f6459d75.js" crossorigin="anonymous"></script>
</body>
</html>