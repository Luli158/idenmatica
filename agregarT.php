<?php
session_start();  						
 if ((isset($_SESSION['estado'])) and ($_SESSION['admin'] == 1)) { 
?>
<html>
<head>
		<link rel='stylesheet' type='text/css' href='estilos.css' media='screen'/>
		<script type='text/javascript' href='java.js'></script>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title>CouchInn</title>
</head>
<body background="img/fondoo.png">
<div class="fondo">
	<div>
		<?php require ("menu.php"); ?>
	<div class='agregar'>
	<div class="titulo">
						<h3>Agregar un tipo de Couch</h3>
					</div>
		<form class='form' action="#" method="POST">
			<a>Nombre del tipo:&nbsp;&nbsp;</a><input type="text" name="tipo" required>
			<br>
			<br>
			<br>
			<input type="submit" value="Agregar">
			<input type="button" value="Cancelar" onClick="window.location.href='vistaba.php' ">
		</form>
<?php 
 if ($_POST) {
		if (isset($_POST['tipo'])) 
		{
			$tipo = $_POST['tipo'];
			$conp= connection();
			$sql="SELECT nombre FROM tipos WHERE nombre='$tipo' ";
			$result= $conp->query ($sql);
			if (mysqli_num_rows($result) == 0){
				$sql2="INSERT INTO tipos (nombre) VALUES ('$tipo')"; 
				if ($result2= $conp->query ($sql2)){ ?>
					<script type="text/javascript">
					alert ("El tipo de Couch fue agregado correctamente"); 
					window.location.href='vistaba.php'
					</script>
		<?php }   
			}
			else { ?>
				<script type="text/javascript">
			alert ("El tipo de Couch ya existe"); 
			</script>
		<?php }
		}	
		else { echo "error";}
	}?>
	</div>
	</div>
	</div>
</body>
</html>
<?php }
else { header("Location:index.php");
}
?>