<?php
session_start();  						
 if ((isset($_SESSION['estado'])) and ($_SESSION['admin'] == 1)) { 
?>
<?php 
if (($_GET['id']) > 0) 
{
$idt= $_GET['id'];
include_once('connection.php');
$conp= connection();
$sql= "select * from couch WHERE idtipo = $idt";
$result= $conp->query ($sql);
	if (mysqli_num_rows($result) == 0){ 
	 $conp->query("DELETE FROM tipos WHERE idtipo = $idt");
		?>
		    <script type="text/javascript"> alert ("El tipo fue eliminado correctamente"); 
	 window.location.href='vistaba.php'; </script>
	<?php }
	
	else {
		echo " ";?> 
		<script type="text/javascript"> alert ("No se puede eliminar el tipo, tiene couches asociados"); 
		window.location.href='vistaba.php'; </script>
		<?php	
           }
}
else {"no borro";}
?>
<?php } 
else { header("Location:index.php");
}
?>
