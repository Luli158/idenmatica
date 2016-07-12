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
				if(isset($_SESSION['estado'])) { 
					if ($_SESSION['admin']=='1') { ?>
							<div class="botonRegistro"><a class="textR" href="vistaba.php">Backend</a></div>
						<?php } } 
	include_once("connection.php");
	$id=$_SESSION['usuario'];
	$consulta=mysqli_query($conec,"SELECT * FROM usuarios WHERE usuarios.idusuario= '$id' ");
	$couch = mysqli_fetch_array($consulta);
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
		<div class="datos">
			<a> <?php echo $couch['nombre'] . ' ' . $couch['apellido'];?> </a><br>
			<a> <?php echo $couch['email']; ?> </a><br>
			<a> <?php echo 'DNI: ' . $couch['documento']; ?> </a><br>
			<a> <?php echo 'Fecha de nacimiento: ' . $couch['fechanac']; ?> </a><br>
			<a> <?php echo 'Direcci&oacute;n: ' . $couch['direccion']; ?> </a><br>
			<a> <?php echo 'Tel: ' . $couch['telefono']; ?> </a><br>
			<?php if ($couch['premium'] == 1) { ?>
			<a> <?php echo 'Usted es usuario premium desde el d&iacute;a: ' . $couch['fechap']; ?> </a><br>
			<?php } else { ?>
				<a> <?php echo 'Usted es usuario com&uacute;n '; ?></a><a href="premium.php">Acceder a Premium</a><br><br> <?php } ?>
		</div>
	</div>
</body>
</html>
<?php }
else { header("Location:index.php");
}
?>