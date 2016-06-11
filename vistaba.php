<?php
session_start();  						
 if ((isset($_SESSION['estado'])) and ($_SESSION['admin'] == 1)) { 
?>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='estilos.css' media='screen'/>
		<script type='text/javascript' href='java.js'></script>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge"> <!-- For intranet testing only, remove in production. -->
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title>CouchInn</title>
	</head>
	<body background="img/fondoo.png">
		<div class='fondo'>
			<?php
				require ("menu.php"); ?>
				<div class='menuba'>
					<div class='tabla'>
						<div class='columnaba'>
							<div class='tituloba'>
								<a> COUCHES </a>
							</div>
							<?php 
								$conp= connection();
								$sql= "select * from couch c INNER JOIN usuarios u WHERE c.idusuario=u.idusuario";
								if ($result= $conp->query ($sql))
									{
										while ($couches= $result->fetch_assoc()){
							?> 
								<div class='textoba'>
									<?php echo $couches["titulo"];?><br>
									<?php echo $couches["email"];?>
									<a href="eliminarC.php?id=<?php echo $couches["idcouch"];?>"><img src="img/eliminar.png" width=15px height=15px></a>
									<a href="modificarC.php?id=<?php echo $couches["idcouch"]; ?>"><img src="img/modificar.png" width=15px height=15px></a>
								</div>
							<?php
								}} 
							?>
							<div>
								<a href="agregarC.php"><input type="button" value="Agregar"></a><br>
							</div>
						</div>
						<div class='columnaba'>
							<div class='tituloba'>
								<a> TIPOS </a>
							</div>
							
							<?php
								$sql= "select * from tipos";
								if ($result= $conp->query ($sql))
									{
										while ($tipos= $result->fetch_assoc()){
							?> 
							<script language="Javascript">
								function preguntar(idtipo){
									eliminar=confirm("¿Deseas eliminar este registro? ");
									if (eliminar)
										window.location.href = "eliminarT.php?id=" + idtipo; 
								}
							</script>
								<div class='textoba'>
									<?php echo $tipos["nombre"];?> <a href="javascript:preguntar(<?php echo $tipos['idtipo']?>)"><img src="img/eliminar.png" width=15px height=15px></a>
									<a href="modificar_tipo.php?id=<?php echo $tipos["idtipo"]; ?>"><img src="img/modificar.png" width=15px height=15px></a>
							<form method="POST" name="bloquear" action="./Vbloquear_tipo.php">
						<?php
    						if($tipos['bloqueado']==0){
    					?>
    							<div class="campo">
    								<input type="hidden" name="id" value="<?php echo $tipos["idtipo"]; ?>">
    								<input type="hidden" name="bloqueado" value="1">
									<input type="submit" value="Bloquear">
    							</div>
    					<?php
    						}
    						else{
    					?>
    							<div class="campo">				
    								<input type="hidden" name="id" value="<?php echo $tipos["idtipo"]; ?>">
    								<input type="hidden" name="bloqueado" value="0">
									<input type="submit" value="Desbloquear">
    							</div>
    					<?php
    						}
    					?>
    			</form>
				</div>
							<?php
								}} 
							?>
							<div>
								<a href="agregarT.php"><input type="button" value="Agregar"></a><br>
							</div>
						</div>
					</div>
				</div>
	</body>
</html>
<?php }
else { header("Location:index.php");
}
?>