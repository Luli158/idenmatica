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
			include ('./menuu.php');
			include_once("connection.php");
			$conec=connection();
			$id=$_GET['id'];
			$consulta=mysqli_query($conec,"SELECT * FROM couch INNER JOIN tipos ON couch.idtipo = tipos.idtipo WHERE couch.idcouch= '$id' ");
			$couch = mysqli_fetch_array($consulta);
		?>
		<div id="cuerpo">
			</br>
			<div id="cajadetalles"><br>
				<div class='en_caja'>
				<div class="campo">
					<H1><?php echo $couch['titulo']?></H1>
				</div>
				</div> <br><br>
				<div class='en_caja'>
				<div class="campo">
					<?php 
						$consultaimagenes="SELECT * FROM imagenescouches WHERE idcouch=$id";
						$consulta="SELECT rutaimagen FROM imagenescouches WHERE idcouch=$id";
						$resulimagenes=mysqli_query($conec,$consultaimagenes);
						$resultado=mysqli_query($conec,$consulta);
						$hayimagen=mysqli_fetch_array($resultado);
						if($hayimagen!=null){
							while($imagen=mysqli_fetch_array($resulimagenes)) {
					?>
								<div style="display: inline-block;"><img src="./<?php echo $imagen['rutaimagen'] ?>" class="fotomic"></div>
					<?php
							}
						}
						else{ 
					?>
							<div><img src="img/logo.png" class="fotomic"></div>
					<?php
						} ?>
				</div>
				</div>
				<div class='en_caja'>
				<div class="campo">
					<p style="line-height: 140%;"><a><?php echo $couch['fecha']?></a><br>
					<a><?php echo $couch['descripcion'] . ' - ' . $couch['nombre'] . ' - Capacidad para ' . $couch['cantpersonas'] . ' personas.' ?></a><p>
					
				</div>
				</div>
				
				<div class="campo">
						<input type="button" value="Volver" onClick="window.location.href='misCouches.php' ">
					</div><br>
			</div>
			<?php $sql = "SELECT * FROM solicitudes s INNER JOIN usuarios u ON s.idusuario = u.idusuario WHERE s.idcouch= $id ORDER BY s.fechadesde ";
					$resul=mysqli_query($conec,$sql); 
				 if (mysqli_num_rows($resul) == 0) { ?>
				<div id="cajadetalles">
					<div id="solicitud">
					<H1>NO TIENES SOLICITUDES PARA ESTE COUCH<H1>
					</div>
				</div>
					<?php } else { ?>	
			<div id="cajadetalles">
					<div id="solicitud">
					<H1>SOLICITUDES </H1> 
					</div>
				<script language="Javascript">
								function aceptar(idsolicitud){
									acepta=confirm("¿Esta seguro que desea aceptar esta solicitud? Se enviara un mail al usuario ");
									if (acepta)
										window.location.href = "aceptarsol.php?id=" + idsolicitud; 
								}
								
								function rechazar(idsolicitud){
									rechaza=confirm("¿Esta seguro que desea rechazar esta solicitud? Se enviara un mail al usuario ");
									if (rechaza)
										window.location.href = "rechazarsol.php?id=" + idsolicitud; 
								}
						</script>

				<div class="tablac">
					<div class="titulos">
					<div class="tit" style="	width:13%;"><H4>SOLICITA</H4></div>
					<div class="tit" style="	width:22%;"><H4>EMAIL</H4></div>
					<div class="tit" style="	width:10%;"><H4>DESDE</H4></div>
					<div class="tit" style="	width:10%;"><H4>HASTA</H4></div>
					<div class="tit" style="	width:22%;"><H4>COMENTARIO<H4></div>
					<div class="tit" style="	width:8%;"><H4>ESTADO</H4></div>
					<div class="tit" style="	width:7%;"><H4>ACCI&Oacute;N</H4></div>
					</div>
					<div class="fila">

				<?php
					if ($result= $conec->query ($sql))
						{
						
							while ($solicitudes= $result->fetch_assoc()){ 
							?> 	
						 <div class="cfila" style="	width:13%;"><?php echo $solicitudes['nombre'] . " " . $solicitudes['apellido'] ; ?> </div>
						 <div class="cfila" style="	width:22%;"><?php echo $solicitudes ['email']; ?></div>
						 <div class="cfila" style="	width:10%;"><?php echo $solicitudes['fechadesde']; ?></div> 
						 <div class="cfila" style="	width:10%;"><?php echo $solicitudes['fechahasta']; ?></div>
						<?php if ($solicitudes['comentariosolicitud'] != null) { ?>
						<div class="cfila" style="	width:22%;"><?php echo ' " ' . $solicitudes['comentariosolicitud'] . ' " '?></div>
						<?php } else { ?> 
						<div class="cfila" style="	width:22%;"><a>Sin comentario</a> </div>
						<?php }
						if ($solicitudes['estado'] == 'espera')
						{ ?>
						<div class="cfila" style="width:8%;">
							<a>En espera</a>
						</div>
						<div class="cfila" style="width:7%;">
							<button type="submit" value="" onClick="javascript:aceptar(<?php echo $solicitudes['idsolicitud']?>)"><img src="img/aceptar.png" style="width:15px">
							<button type="submit" value="" onClick="javascript:rechazar(<?php echo $solicitudes['idsolicitud']?>)"><img src="img/rechazar.png" style="width:15px">
						</div>
						<?php }
						else if ($solicitudes['estado'] == 'aceptada') { ?>
						<div class="cfila" style="width:8%;">
							<a>Aceptada</a> <a><?php echo $solicitudes['fechaaceptada']; ?> </a>
						</div>
						<div class="cfila" style="width:7%;">
							<button type="submit" value="" onClick="javascript:rechazar(<?php echo $solicitudes['idsolicitud']?>)"><img src="img/rechazar.png" style="width:15px;">
						</div>
							<?php 
							}
							else { ?> 
						<div class="cfila" style="width:8%;"> <a>Rechazada</a></div>
						<div class="cfila" style="width:7%;">
							<button type="submit" value="" onClick="javascript:aceptar(<?php echo $solicitudes['idsolicitud']?>)"><img src="img/aceptar.png" style="width:15px;">
						</div>
						<?php } ?>
				
						<?php } } ?>
					</div>
					<div class="campo">
						<input type="button" value="Volver" onClick="window.location.href='misCouches.php' ">
					</div>
			</div>
			
		</div>
		<?php }
			mysqli_close($conec);
		?>
	</body>
</html>
<?php }
else { header("Location:index.php");
}
?>