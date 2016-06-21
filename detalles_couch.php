<?php
	session_start();
	if($_SESSION['estado']!='logueado'){
		header('Location: ./ingresar.php?error=16');
	}
?>
<html>
	<head>
		<script src="./validarSolicitud.js"></script>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title>CouchInn</title>
		<link rel ='stylesheet' type='text/css' href='./estilos.css'>
	</head>
	<body>
		<?php
			include ('./menu.php');
			include_once("./connection.php");
			$conec=connection();
			$id=$_GET['id'];
			$consulta=mysqli_query($conec,"SELECT * FROM couch INNER JOIN tipos ON (couch.idtipo = tipos.idtipo) WHERE idcouch=$id");
			$couch=mysqli_fetch_array($consulta);
			$consulta="SELECT * FROM solicitudes INNER JOIN usuarios ON (solicitudes.idusuario = usuarios.idusuario) WHERE idsolicitud=$id";
			$resul=mysqli_query($conec,$consulta);
			$solicitud=mysqli_fetch_array($resul);
		?>
		<div id="cuerpo">
			</br>
			<div id="cajadetalles">
				<div class='en_caja'>
				<div class="campo">
					<H3>Fecha de publicaci&oacuten: </H3>
					<p><?php echo $couch['fecha']?></p>
				</div>
				</div>
				<div class='en_caja'>
				<div class="campo">
					<H3>T&iacutetulo: </H3>
					<p><?php echo $couch['titulo']?></p>
				</div>
				</div>
				<div class='en_caja'>
				<div class="campo">
					<H3>Descipci&oacuten: </H3>
					<p><?php echo $couch['descripcion']?></p>
				</div>
				</div>
				<div class='en_caja'>
				<div class="campo">
					<H3>Capacidad: </H3>
					<p><?php echo $couch['cantpersonas']?></p>
				</div>
				</div>
				<div class='en_caja'>
				<div class="campo">
					<H3>Foto: </H3>
					<?php 
						$consultaimagenes="SELECT * FROM imagenescouches WHERE idcouch=$id";
						$consulta="SELECT rutaimagen FROM imagenescouches WHERE idcouch=$id";
						$resulimagenes=mysqli_query($conec,$consultaimagenes);
						$resultado=mysqli_query($conec,$consulta);
						$hayimagen=mysqli_fetch_array($resultado);
						if($hayimagen!=null){
							while($imagen=mysqli_fetch_array($resulimagenes)) {
					?>
								<div class="fotoDet"><img src="./<?php echo $imagen['rutaimagen'] ?>"></div>
					<?php
							}
						}
						else{
					?>
							<div class="fotoDet"><img src="./imagenes/Favicon.png"></div>
					<?php
						}

					/*$result=mysqli_query($con, "select premium from usuarios where idusuario = '$id'");
					$f = $result -> fetch_row();
					if($f != 0)
					{	
						if($couch['foto']==null)
						{?>
									<img src="img/Favicon.png">
									<?php
									}
									else
									{ ?>
										<img src="mostrarImagen.php?id=<?php echo $id;?>"class="property_img"/>
									<?php 
									}
								}
					else
						{?>
							<img src="img/Favicon.png"/>
						<?php
						}*/
					?>
				</div>
				</div>
				<div class='en_caja'>
				<div class="campo">
					<H3>Tipo de Couch: </H3>
					<p><?php echo $couch['nombre']?></p>
				</div>
				</div>
				<div class='en_caja'>
				<div class="campo">
					<H3>Usuario que public&oacute: </H3>
					<p>
					<?php
						$consulta=mysqli_query($conec,"SELECT nombre, apellido FROM usuarios WHERE idusuario=$couch[idusuario]");
						$dueño=mysqli_fetch_array($consulta);
						echo $dueño['nombre'];
					?> &nbsp
					<?php 
						echo $dueño['apellido'];
					?>
					</p>
				</div>

 <?php 			
 				if(!isset($_SESSION)) {
					session_start();
				}
				if(isset($_SESSION['usuario']) && $_SESSION['usuario'] != $couch['idusuario']) {
					$c="SELECT * FROM solicitudes WHERE idcouch = '$id' AND idusuario = '$_SESSION[usuario]'";
					$r=mysqli_query($conec,$c);
					if(mysqli_num_rows($r)==0) {
?>
						<div id="solicitud">
							<div id="crear_solicitud">
							<b>Solicitar Couch:</b>
								<form method="POST" name="solicitar" action="./Venviar_solicitud.php">
									<p>Llegada:</p>
									<input type=date name=llegada>
									<p>Salida:</p>
									<input type=date name=salida>
									<p>Comentario:</p>
									<textarea id="comentariosol" name="comentariosol" rows="6" cols="50" maxlength="1000" placeholder="Opcional"></textarea>
									<input type="hidden" name="idcouch" value="<?php echo $id; ?>">
									<input type="button" value="Enviar Solicitud" onclick="validarSolicitud(event)">
								</form>
							</div>
						</div>
<?php						
					}
				}
?>
				<div class="campo">
					<input type="button" value="Volver" onClick="window.location.href='index.php'">
				</div>
				</br>
				</div>
			</div>
		</div>
		<?php
			mysqli_close($conec);
		?>
	</body>
</html>