<?php
	include_once("./connection.php");
	$conec=connection();
	$idc=$_GET["id"];
	$bloqueado=$_GET["bloqueado"];
	 if($bloqueado==1){
		$s = $conec->query("SELECT * FROM solicitudes s WHERE s.idcouch = $idc AND s.estado = 'espera'");
		if (mysqli_num_rows($s) > 0){ ?>
		<script type="text/javascript"> alert ("Usted tiene solicitudes pendientes en este Couch, debe responderlas antes de despublicarlo"); window.location.href='miCouch.php?id=<?php echo $idc ?>' </script>
		<?php }
		else { $sql= "UPDATE couch SET couch.despublicado = $bloqueado WHERE couch.idcouch = $idc";
			mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($con));?>
		<script type="text/javascript"> alert ("Su Couch fue despublicado, no podra recibir mas solicitudes"); window.location.href='misCouches.php' </script>
		<?php }
	} 
	else {
	$sql= "UPDATE couch SET despublicado='$bloqueado' WHERE idcouch='$idc'";
	mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($con));?>
	<script type="text/javascript"> alert ("Su Couch fue publicado nuevamente, podra recibir solicitudes"); window.location.href='misCouches.php' </script>
<?php	}	

?>