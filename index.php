<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  ?>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='estilos.css' media='screen'/>
		<script type='text/javascript' href='java.js'></script>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge"> <!-- For intranet testing only, remove in production. -->
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>CouchInn</title>
	</head>
	<body background="img/fondoo.png">
		<div class="fondo">
				<?php
					require ("menu.php");
				if(!isset($_SESSION['estado'])) { ?>
				<div class="botonRegistro"><a class="textR" href="registro.php">Registrarse</a></div>
				<?php 
				}
				else {
						if ($_SESSION['admin']=='1') { ?>
							<div class="botonRegistro"><a class="textR" href="vistaba.php">Backend</a></div>
						<?php } else{ ?> <br><br> <?php } } ?>
				<br>
				<div class="imagenes" id="slideShowImages">
					<img src="img/couch1.jpg" alt="Slide 1" />
					<img src="img/couch2.jpg" alt="Slide 2" />
					<img src="img/couch3.jpg" alt="Slide 3" />    
					<img src="img/couch4.jpg" alt="Slide 4" />
					<img src="img/couch5.jpg" alt="Slide 5" />
					<img src="img/couch6.jpg" alt="Slide 6" />
				</div>  
				<script src="slideShow.js"></script>
			<br>
			<div class="op">
				<div class="opc"><a href="quienes.php"><img class="opcion" src="img/couch.png"></a></div>
				<div class="opc"><a href="buscar.php"><img class="opcion" src="img/buscarc.png"></a></div>
				<div class="opc"><a href="contacto.php"><img class="opcion" src="img/contacto.png"></a></div>
			</div>
			<br>
			<br>
			<div class=pie>
				<a>couchinn@hotmail.com &nbsp; &nbsp; CouchInn© Derechos Reservados 2015-2017</a>
			</div> 
		</div>
	</body>
</html>