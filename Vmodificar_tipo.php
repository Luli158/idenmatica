<?php
	include_once("./connection.php");
	$conec=connection();
	$idtipo=$_POST["id"];
	$nombre=$_POST["nombre"];
	$resul=mysqli_query($conec, "SELECT * FROM tipos WHERE nombre='$nombre'");
		if(mysqli_num_rows($resul)==0){
			$sql= "UPDATE tipos SET nombre='$nombre' WHERE idtipo='$idtipo'";
			mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($conec));
?>
			<script type="text/javascript"> alert ("Modificacion de tipo exitosa"); window.location.href='vistaba.php' </script>
<?php
		}
		else { ?>
		<script type="text/javascript"> alert ("No se pudo modificar. Ese tipo ya existe."); window.location.href='vistaba.php';</script>
		<?php }
?>