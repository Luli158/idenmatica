<?php
	session_start();
	include_once ("connection.php");
	$con=connection();
	$ids = $_GET['id'];
	$sql= "SELECT * FROM solicitudes s WHERE s.idsolicitud = $ids";
	$result = $con->query ($sql);
	$sol = $result->fetch_assoc();
	$idc = $sol['idcouch'];
	$fechad = $sol ['fechadesde'];
	$fechah= $sol ['fechahasta'];
	$idc = $sol['idcouch'];
	$idu = $sol['idusuario'];//ID DEL QUE MANDA LA SOLICITUD
	$usu = $_SESSION ['usuario']; // ID DEL QUE RECHAZA LA SOLICITUD	
	require_once('mailRechazar.php');
	require_once('mailSolRec.php');
	if ($sol['fechaaceptada'] != NULL)
	{
		enviar($usu, $idu, $fechad, $fechah);
		enviarA($idu, $usu, $idc, $fechad, $fechah);
	}

	$sql ="UPDATE solicitudes SET estado='rechazada', fechaaceptada = NULL WHERE idsolicitud= $ids";

	if ($con->query ($sql))
	{ ?>
	  <script type="text/javascript"> alert ("Se ha rechazado la solicitud correctamente"); 
	 window.location.href='miCouch.php?id=<?php echo $sol['idcouch']?>'; </script>
	<?php } ?>