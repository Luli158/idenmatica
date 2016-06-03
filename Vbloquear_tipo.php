<?php
	include_once("./connection.php");
	$conec=connection();
	$idtipo=$_POST["id"];
	$bloqueado=$_POST["bloqueado"];
	$sql= "UPDATE tipos SET bloqueado='$bloqueado' WHERE idtipo='$idtipo'";
	mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($con));
?>
<?php
    if($bloqueado==1){
?>
		<script type="text/javascript"> alert ("Bloqueo exitoso"); window.location.href='vistaba.php' </script>
<?php
	}
    else{
?>
		<script type="text/javascript"> alert ("Desbloqueo exitoso"); window.location.href='vistaba.php' </script>
<?php
	}
?>