<?php 

	$op=$_POST['op'];
	$idu=$_POST['idu'];
	$idud=$_POST['idud'];
	$idc= $_POST['idc'];
	if (isset($_POST['comentario']))
	{
		$com = $_POST['comentario'];
	}
	else { $com = 'NULL';}
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$hoy = date("Y-m-d");
	include_once("connection.php");
	$conec=connection();
	$sql="INSERT INTO hacecomentario (idusuario, idusuario2, comentario, puntuacion, fecha) VALUES ('$idu', '$idud', '$com', '$op', '$hoy')";
	$conec->query($sql); 
	?>
		
	<script type="text/javascript">
		alert ('Se ha enviado tu puntuacion correctamente');
		 window.location.href='miCouch.php?id=<?php echo $idc; ?>'; 
	</script>
	