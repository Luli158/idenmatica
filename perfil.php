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
	$consulta=mysqli_query($conec,"SELECT * FROM usuarios WHERE usuarios.idusuario= '$id' ");
	$couch = mysqli_fetch_array($consulta);
	?>
	<div style="text-align:center; margin-top:50px;">
	<a> <?php echo $couch['nombre'] . ' ' . $couch['apellido'];?> </a><br>
	<a> <?php echo $couch['email']; ?> </a><br>
	<a> <?php echo 'DNI: ' . $couch['documento']; ?> </a><br>
	<a> <?php echo 'Fecha de nacimiento: ' . $couch['fechanac']; ?> </a><br>
	<a> <?php echo 'Direcci&oacute;n: ' . $couch['direccion']; ?> </a><br>
	<?php if ($couch['premium'] == 1) { ?>
	<a> <?php echo 'Usted es usuario premium desde el d&iacute;a: ' . $couch['fechap']; ?> </a><br>
	<?php } else { ?>
		<a> <?php echo 'Usted es usuario com&uacute;n '; ?></a><a href="premium.php">Acceder a Premium</a><br><br> <?php } ?>
	<a href="modificar_perfil.php"> Modificar Perfil </a><br><br>
	<a href="misCouches.php"> Mis Couches </a><br><br>
	<a href="ver_mis_solicitudes.php"> Mis solicitudes enviadas </a><br><br>
	<a href="comentarios.php"> Mis comentarios </a><br><br>
	<a href="couchHospede.php"> Couches donde me hospede </a><br><br>
	<a href="publicar_couch.php"> Publicar Couch </a><br><br>
	<a href="cerrar.php"> Cerrar sesi&oacute;n</a><br><br><br><br>
	<a href="index.php">Volver </a>
	</div>
</body>
</html>
<?php }
else { header("Location:index.php");
}
?>