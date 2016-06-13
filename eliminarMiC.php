<?php
	session_start();
	if($_SESSION['estado']=='logueado'){
		
?>
<?php 
if (($_GET['id']) > 0) 
{
$idc= $_GET['id'];
include_once('connection.php');
$conp= connection();
date_default_timezone_set('America/Argentina/Buenos_Aires');
$hoy = date("Y-m-d");
$sql= "select * from couch c INNER JOIN solicitudes s ON c.idcouch = s.idcouch WHERE c.idcouch = '$idc' AND s.estado = 'aceptada' AND s.fechahasta >= '$hoy'";
$result= $conp->query ($sql);
	if (mysqli_num_rows($result) == 0){
	 $s = $conp->query("SELECT * FROM solicitudes WHERE idcouch = $idc AND solicitudes.estado <> 'aceptada'");
		if (mysqli_num_rows($s) > 0){ 
	
			$conp->query("UPDATE solicitudes SET idcouch='null' WHERE idcouch=$idc");
		}
	 $conp->query("DELETE FROM couch WHERE idcouch = $idc");
		?>
		    <script type="text/javascript"> alert ("El Couch fue eliminado correctamente"); 
	 window.location.href='misCouches.php'; </script>
	<?php }
	
	else {
		?> 
		<script type="text/javascript"> alert ("No se puede eliminar el Couch, tiene solicitudes aceptadas pendientes"); 
		window.location.href='misCouches.php'; </script>
		<?php	
           }
}
else {"no borro";}
?>
<?php }
else { header("Location:index.php");
}
?>