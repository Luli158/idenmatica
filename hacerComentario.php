<?php 

	$op=$_POST['op'];
	$idu=$_POST['idu'];
	$idc=$_POST['idc'];
	if (isset($_POST['comentario']))
	{
		$com = $_POST['comentario'];
	}
	else { $com = 'NULL';}
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$hoy = date("Y-m-d");
	include_once("connection.php");
	$conec=connection();
	$sql="INSERT INTO comentarios (fecha, puntuacion, comentario, idusuario, idcouch) VALUES ('$hoy', '$op', '$com', '$idu', '$idc')";
	$conec->query($sql); 
	?>
	
	<script type="text/javascript">
	alert ('Se ha enviado tu puntuacion correctamente');
	 window.location.href='detalles_couch.php?id=<?php echo $idc; ?>'; </script>

