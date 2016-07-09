<?php
	session_start();
	if($_SESSION['estado']=='logueado'){
		
?>
<html>
<head>
<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title>CouchInn</title>
		<link rel ='stylesheet' type='text/css' href='./estilos.css'>
</head>
<body>
	<?php include ('./menuu.php'); 
	include_once("connection.php");
	$id=$_SESSION['usuario'];
	$consulta="SELECT * FROM preguntas p INNER JOIN couch c ON p.idcouch = c.idcouch 
				INNER JOIN usuarios u ON p.idusuario = u.idusuario 
				WHERE c.idcouch IN (SELECT couch.idcouch FROM couch INNER JOIN usuarios ON usuarios.idusuario = couch.idusuario WHERE usuarios.idusuario = $id ) 
				ORDER BY p.fechaPreg";
	?>
	<div class="contPerfil">
		<div class="opcionesPerfil">
			<ul id='button'>
			<li><a href="modificar_perfil.php">Modificar Perfil</a></li>
			<li><a href="misCouches.php">Mis Couches</a></li>
			<li><a href="ver_mis_solicitudes.php">Mis solicitudes enviadas </a></li>
			<li><a href="preguntas.php">Mis preguntas</a></li>
			<li><a href="couchHospede.php">Couches donde me hosped&eacute;</a></li>
			<li><a href="publicar_couch.php">Publicar Couch</a></li>
			<li><a href="eliminarCuenta.php">Eliminar mi cuenta</a></li>
			</ul>
		</div>
	
		<div class="preguntas">
		<h1> PREGUNTAS </h1>
		<?php	if ($resul=mysqli_query($conec,$consulta))
						{ 
							while ($preg= $resul->fetch_assoc()){ ?>
			<div class="pregunta">
				<?php echo 'Tienes una pregunta para el Couch ' . '"' . $preg['titulo'] . '"'; ?> <br/>
				<?php echo $preg['fechaPreg'];?> <br>
				 <?php echo $preg['nombre'] . ' ' . $preg['apellido'] . ': '; ?> <br>
				 <?php echo $preg['pregunta']; ?>
			</div>
			<div class="respuesta">
			<?php if ($preg['respuesta'] == NULL) { ?>
				 <form method='post' name='responder' action='preguntas.php'>
				 <input type='text' name='respuesta' id='respuesta'>
				 <input type='hidden' name='id' id='id' value='<?php echo $preg['idpregunta']; ?>'>
				 <input type='submit' value='Responder'> 
				 	<?php 
						if ($_POST) { 
							$respuesta = $_POST['respuesta'];
							$idp = $_POST['id'];
							mysqli_query($conec,"UPDATE preguntas SET respuesta='$respuesta' WHERE idpregunta = $idp");
						}
					?>
				 </form>
				<?php  } else {
				echo $preg['respuesta']; 
				 }?>
			</div><br>
			<?php } }?>
		</div>
	</div>

</body>
</html>
<?php }
else { header("Location:index.php");
}
?>