<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
</head>

<body>
	<div>
		<h1>Prueba postulación trabajo Desarrollador Web</h1>
  			<h2>By Diego Gajardo</h2>
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
	          
	          	<div class="button-container" >
	          		<button type="button" class="my-button" style="margin-top: 33px;"> Vehiculos
	          		
                		<i class="fa-solid fa-right-to-bracket"></i>
            		</button>
	          	</div>
	          
	        </label>
	      
	        <label class="song-info" id="song-info-2">
	          	<div class="button-container">
	            <button type="button" class="my-button"> Usuarios
                		<i class="fa-solid fa-right-to-bracket"></i>
            		</button>
	            </div>
	        </label>
	      </div>
	    </div>
	    
	  </div>
	</div>
<script src="{{ asset('js/inicio.js') }}" defer></script>
<script src="https://kit.fontawesome.com/90f6459d75.js" crossorigin="anonymous"></script>
</body>
</html>