<?php
	include_once ("connection.php");
	$con=connection();
	$ids = $_GET['id'];
	$sql= "SELECT * FROM solicitudes s WHERE s.idsolicitud = $ids";
	$result = $con->query ($sql);
	$sol = $result->fetch_assoc();
	$idc = $sol['idcouch'];
	$sql ="UPDATE solicitudes SET estado='rechazada' WHERE idsolicitud= $ids";

	if ($con->query ($sql))
	{ ?>
	  <script type="text/javascript"> alert ("Se ha rechazado la solicitud correctamente"); 
	 window.location.href='miCouch.php?id=<?php echo $sol['idcouch']?>'; </script>
	<?php } ?>