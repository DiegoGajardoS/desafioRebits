<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
  <title>Inicio</title>
</head>

<body>

    <div>

		<h1>Prueba postulación trabajo Desarrollador Web - ReBits</h1>
  			<h2>Sistema CRUD de vehículos y usuarios</h2>
  			<h2>Click en la imagen para desplegar el enlace a vehículos o usuarios</h2>
  			<h4>By Diego Gajardo</h4>
  			
	</div>
	  
	  <div class="container">
	  <input type="radio" name="slider" id="item-1" checked>
	  <input type="radio" name="slider" id="item-2">
	  
	  <div class="cards">
	    <label class="card" for="item-1" id="song-1">
	      <img src="{{ asset('images/auto.png') }}" alt="song">
	    </label>
	    <label class="card" for="item-2" id="song-2">
	      <img src="https://www.pngmart.com/files/21/Account-User-PNG-HD.png" alt="song">
	    </label>
	  
	  </div>
	  <div class="player">
	    <div class="upper-part">
	      
	      <div class="info-area" id="test">
	        <label class="song-info" id="song-info-1">
	          
	          	<div class="button-container">
    						<a href="{{ route('listarVehiculos') }}" class="my-button" style="margin-top: 47px;text-decoration: none;">
        					Vehículos
        					<i class="fa-solid fa-right-to-bracket"></i>
    						</a>
							</div>
	          
	        </label>
	      
	        <label class="song-info" id="song-info-2">
	          	<div class="button-container">
	            <a href="/usuarios" class="my-button" style="margin-top: 5px; margin-bottom: 7px;text-decoration: none;"> Usuarios
                		<i class="fa-solid fa-right-to-bracket"></i>
            		</a>
	            </div>
	        </label>

	      </div>
	    </div>
	    
	  </div>
	  <div class="glowing">
    
    		<span style="--i:1;"></span>
    
    		<span style="--i:2;"></span>
    
    		<span style="--i:3;"></span>

    
  	</div>

	</div>

<script src="{{ asset('js/inicio.js') }}" defer></script>
<script src="https://kit.fontawesome.com/90f6459d75.js" crossorigin="anonymous"></script>
</body>
</html>