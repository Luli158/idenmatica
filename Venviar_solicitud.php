<?php
	include_once("connection.php");
	$conec=connection();
	session_start();
	$idcouch=$_POST["idcouch"];
	$idusuario=$_SESSION['usuario'];
	$comentario=$_POST["comentariosol"];
	$fechadesde=$_POST["llegada"];
	$fechahasta=$_POST["salida"];
	$estado="En espera";
	$sql= "INSERT INTO solicitudes (idcouch, idusuario, estado, comentariosolicitud, fechadesde, fechahasta) VALUES ('$idcouch', '$idusuario', '$estado', '$comentario', '$fechadesde', '$fechahasta')";
		mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($conec));
?>
	<script type="text/javascript"> alert ("Solicitud enviada"); window.location.href='index.php' </script>