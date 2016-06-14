<?php
	session_start();
	if($_SESSION['estado']=='logueado'){
		
?>
<html>
	<head>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title>CouchInn</title>
		<link rel ='stylesheet' type='text/css' href='./estilos.css'>
	</head>
	<body>
		<?php
			include ('./menu.php');
			include_once("connection.php");
			$conec=connection();
			$id=$_GET['id'];
			$consulta=mysqli_query($conec,"SELECT * FROM couch INNER JOIN tipos ON couch.idtipo = tipos.idtipo WHERE couch.idcouch= '$id' ");
			$couch = mysqli_fetch_array($consulta);
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
					$con=connection();
					$result=mysqli_query($con, "select premium from usuarios where idusuario = '$id'");
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
						}
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
					<br>
				</div>
			</div>
			<div id="cajadetalles">
				<div class='en_caja'>
				<div class="campo">
					<H1>Solicitudes: </H1>
				</div>
				</div>
				
				<?php $sql = "SELECT * FROM solicitudes s INNER JOIN usuarios u ON s.idusuario = u.idusuario WHERE s.idcouch= $id ";
				if ($result= $con->query ($sql))
					{
						while ($solicitudes= $result->fetch_assoc()){ 
						?> 
						<script language="Javascript">
								function aceptar(idsolicitud){
									acepta=confirm("¿Esta seguro que desea aceptar esta solicitud? ");
									if (acepta)
										window.location.href = "aceptarsol.php?id=" + idsolicitud; 
								}
								
								function rechazar(idsolicitud){
									rechaza=confirm("¿Esta seguro que desea rechazar esta solicitud? ");
									if (rechaza)
										window.location.href = "rechazarsol.php?id=" + idsolicitud; 
								}
						</script>
				<div class='en_caja'>
				<div class="campo">
				
						<H3>Usuario que realizo la solicitud: </H3>
					<p><?php echo $solicitudes['nombre']; echo ' '; echo $solicitudes['apellido']; echo '  - 	Email: '; echo $solicitudes ['email']; ?></p>
					<H3>Fecha de solicitud: </H3>
					<p><?php echo 'Desde: '; echo $solicitudes['fechadesde']; echo ' -  Hasta: '; echo $solicitudes['fechahasta']; ?></p>	
					<H3>Estado de solicitud: </H3>
					<p><?php 
					if ($solicitudes['estado'] == 'espera')
					{ ?>
					En espera
						<br><br>
						<input type="submit" value="Aceptar" onClick="javascript:aceptar(<?php echo $solicitudes['idsolicitud']?>)">
						<input type="submit" value="Rechazar" onClick="javascript:rechazar(<?php echo $solicitudes['idsolicitud']?>)">
					<?php }
					else if ($solicitudes['estado'] == 'aceptada') { ?>
					Aceptada<br><br><input type="submit" value="Rechazar" onClick="javascript:rechazar(<?php echo $solicitudes['idsolicitud']?>)">
					<?php 
					}
					else { ?> Rechazada<br><br><input type="submit" value="Aceptar" onClick="javascript:aceptar(<?php echo $solicitudes['idsolicitud']?>)">
					<?php } ?></p>	
					
				</div>
				</div>
				<br>
			<?php } }?>
			</div>
			<div class="campo">
						<input type="button" value="Volver" onClick="window.location.href='misCouches.php' ">
					</div>
		</div>
		<?php
			mysqli_close($conec);
		?>
	</body>
</html>
<?php }
else { header("Location:index.php");
}
?>