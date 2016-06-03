<?php
	session_start();
	if($_SESSION['admin'] != '1'){
		header('Location: ./index.php?error=0');
	}
?>
<html>
	<head>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title> CouchInn </title>
	</head>
	<link rel="stylesheet" type="text/css" href="./estilos.css">
	<script language="JavaScript" src="./validarModificar.js" type="text/javascript"></script>
	<body>
		<?php
			include ('./menu.php');
		?>
		<div id="cuerpo">
			</br>
			<div class="agregar">
				<form method="POST" name="modificar" action="./Vmodificar_tipo.php">
					<div class="titulo">
						<h3>Modificar un tipo de Couch</h3>
					</div>
					<div class="en_caja">
							<?php
								include_once('./connection.php');
								$conec=connection();
								$id=$_GET['id'];
								$resul=mysqli_query($conec,"SELECT * FROM tipos WHERE idtipo=$id");
								$tipo=mysqli_fetch_array($resul);
							?>
						
						<input type="hidden" name="id" value="<?php echo $tipo['idtipo'];?>">
						<div class="campo">
							<a>Nombre: </a><input type="text" name="nombre" id="nombre" value="<?php echo $tipo['nombre'];?>" size=30>
						</div>
    					</script>
					</div>
					</br>
					<div class="en_caja">
						<div class="campo">
							<input type="submit" value="Modificar" onsubmit="return esValidadoT();">
							<input type="button" value="Cancelar" onClick="window.location.href='vistaba.php' ">
						</div>
					</div>
				</form>
				<form method="POST" name="bloquear" action="./Vbloquear_tipo.php">
						<?php
    						if($tipo['bloqueado']==0){
    					?>
    							<div class="campo">
    								<p>Bloquear tipo?</p>
    								<input type="hidden" name="id" value="<?php echo $id ?>">
    								<input type="hidden" name="bloqueado" value="1">
									<input type="submit" value="Si">
    							</div>
    					<?php
    						}
    						else{
    					?>
    							<div class="campo">
    								<p>Desbloquear tipo?</p>   					
    								<input type="hidden" name="id" value="<?php echo $id ?>">
    								<input type="hidden" name="bloqueado" value="0">
									<input type="submit" value="Si">
    							</div>
    					<?php
    						}
    					?>
    			</form>
			</div>
		</div>
	</body>
</html>