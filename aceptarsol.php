<?php
	include_once ("connection.php");
	$con=connection();
	$ids = $_GET['id'];
	$sql= "SELECT * FROM solicitudes s WHERE s.idsolicitud = $ids";
	$result= $con->query ($sql);
	$sol= $result->fetch_assoc();
	$fechad = $sol ['fechadesde'];
	$fechah= $sol ['fechahasta'];
	$idc = $sol['idcouch'];

	$sql ="SELECT * FROM solicitudes s WHERE s.idcouch= $idc AND s.estado = 'aceptada' 
				AND (s.fechadesde BETWEEN '$fechad' AND '$fechah' OR s.fechahasta BETWEEN '$fechad' AND '$fechah'
				OR '$fechad' BETWEEN s.fechadesde AND s.fechahasta OR '$fechah' BETWEEN s.fechadesde AND s.fechahasta)";
			$s = $con->query($sql);
		if (mysqli_num_rows($s) > 0)
		{ ?>
		<script type="text/javascript"> alert ("Usted tiene solicitudes aceptadas que coinciden con esas fechas"); 
	 window.location.href='miCouch.php?id=<?php echo $sol['idcouch']?>'; </script>
		
		<?php }
		
		else 
		{
		$sql ="UPDATE solicitudes SET estado='aceptada' WHERE idsolicitud= $ids";
		$con->query($sql);
		$sql ="UPDATE solicitudes SET estado='rechazada' WHERE idcouch= $idc AND estado = 'espera' 
				AND (fechadesde BETWEEN '$fechad' AND '$fechah' OR fechahasta BETWEEN '$fechad' AND '$fechah'
				OR '$fechad' BETWEEN fechadesde AND fechahasta OR '$fechah' BETWEEN fechadesde AND fechahasta)";
				$s = $con->query($sql);	 ?>
				<script type="text/javascript"> alert ("La solicitud fue aceptada y se han rechazado las solicitudes que coinciden con su fecha"); 
	 window.location.href='miCouch.php?id=<?php echo $sol['idcouch']?>'; </script>
		 
		
		<?php } ?>