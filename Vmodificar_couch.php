<?php
	include_once("connection.php");
	$conec=connection();
	session_start();
	$idcouch=$_POST["idcouch"];
	$idusuario=$_SESSION['usuario'];
	$fecha=$_POST["fecha"];
	$titulo=$_POST["titulo"];
	$descripcion=$_POST["descripcion"];
	$ubicacion=$_POST["ubicacion"];
	$cantpersonas=$_POST["capacidad"];
	$despublicado='0';
	$tipo=$_POST["tipo"];
	$sql= "UPDATE couch SET fecha='$fecha', titulo='$titulo', descripcion='$descripcion', ubicacion='$ubicacion', cantpersonas='$cantpersonas', despublicado='$despublicado', idusuario='$idusuario', idtipo='$tipo' WHERE idcouch=$idcouch";
	mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($conec));
	?>
	<script type="text/javascript"> alert ("Modificacion exitosa"); window.location.href='modificar_couch.php' </script>