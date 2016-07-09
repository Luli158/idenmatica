<?php
	session_start();
	$id=$_GET['id'];
	$idu= $_SESSION['usuario'];
	include_once("connection.php");
	$conec=connection();
	$consulta=mysqli_query($conec,"SELECT * FROM couch INNER JOIN usuarios ON couch.idusuario = usuarios.idusuario WHERE couch.idcouch= $id AND couch.idusuario = $idu ");
	$consulta->fetch_assoc();
	if(mysqli_num_rows($consulta) > 0) {
	if($_SESSION['estado']=='logueado') {
		
?>
<html>
	<head>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title>CouchInn</title>
		<link rel ='stylesheet' type='text/css' href='./estilos.css'>
		<script type="text/javascript">
						function muestra_oculta(id){
						if (document.getElementById){ //se obtiene el id
						var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
						el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
						}
						}
						window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
						muestra_oculta('contenido_a_mostrar');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
						}
		</script>
	</head>
	<body>
		<?php
			include ('./menuu.php');
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
				
			<p><a style='cursor: pointer;' onclick="muestra_oculta('calificaciones')" title="">Calificaciones</a></p>
			<div id="calificaciones" style='display:none;'>
				<br>
				
				<div class='en_caja'>
				<div class="campo">
					<?php 
						$conco="SELECT * FROM comentarios c INNER JOIN usuarios u ON c.idusuario = u.idusuario WHERE c.idcouch = $id";
						if ($result= $conec->query ($conco))
									{
										while ($comen= $result->fetch_assoc()){
					?> 
					<div>
						<?php echo $comen['fecha'];?>
						<?php echo $comen['nombre'] . ' ' . $comen['apellido'];?>
						<?php echo $comen['puntuacion'];?>
						<?php if ($comen['comentario'] != NULL) {echo $comen['comentario']; }?>	
					</div>
					<?php } } ?>
				</div>
				</div>
				<br>
				<br>
				
				<?php 
				date_default_timezone_set('America/Argentina/Buenos_Aires');
				$hoy = date("Y-m-d");
				$sq=("SELECT * FROM solicitudes s INNER JOIN usuarios u ON s.idusuario = u.idusuario WHERE s.estado = 'aceptada' AND s.fechahasta < $hoy AND s.idusuario = $idu");
				$result=mysqli_query($conec, $sq);
				$result->fetch_assoc();
					if(mysqli_num_rows($result) > 0) { ?>
				
				<div class='en_caja'>
				<div class="campo">
					<form class="comentarios" method='POST' action="hacerComentario.php">
						<div class="puntaje">
						<select name="op"> 
							<option id="1" value="1">1</option>
							<option id="2" value="2">2</option>
							<option id="3" value="3">3</option>
							<option id="4" value="4">4</option>
							<option id="5" value="5">5</option>
						</select>
						</div>
						<div class="comentario">
						<br/>
							<input type="text" name="comentario">
						</div>
						<br/>
						<input type="hidden" name="idc" value="<?php echo $id; ?>">
						<input type="hidden" name="idu" value="<?php echo $idu; ?>">
						<input type="submit" value="Enviar"> 
					</form>
				</div>
				</div>
				<?php } ?>	
			</div>
			
			<div id="preguntas">
				<p><a>Preguntas</a></p>
				<br>				
				<div class='en_caja'>
				<div class="campo">
					<?php 
						$conp="SELECT * FROM preguntas p INNER JOIN usuarios u ON p.idusuario = u.idusuario WHERE p.idcouch = $id";
						if ($result= $conec->query ($conp))
									{
										while ($preg= $result->fetch_assoc()){
					?> 
					<div>
						<?php echo $preg['fechaPreg'];?>
						<?php echo $preg['nombre'] . ' ' . $preg['apellido'];?>
						<?php echo $preg['pregunta'];?>
						<?php if ($preg['respuesta'] != NULL) { echo $preg['respuesta']; }
									else { 
										 ?>
										 <form method='post' name='responder' action='responder.php'>
										 <input type='text' name='respuesta' id='respuesta'>
										 <input type='hidden' name='id' id='id' value='<?php echo $preg['idpregunta']; ?>'>
										 <input type='hidden' name='idc' id='idc' value='<?php echo $id; ?>'>
										 <input type='submit' value='Responder'> 
										 </form>
							<?php	} ?>	
					</div>
					<?php } } ?>
				</div>
				</div>
			
				<div class="campo">
				<br/>
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
					
					<p><a style='cursor: pointer;' onclick="muestra_oculta('usuariosHospede')" title="">Usuarios que hospede</a></p>
						<div id="usuariosHospede" style='display:none;'>
							<div class='en_caja'>
							<div class="campo">
								<?php 
								date_default_timezone_set('America/Argentina/Buenos_Aires');
								$hoy = date("Y-m-d");
								$cons= "SELECT * FROM usuarios u INNER JOIN solicitudes s ON s.idusuario = u.idusuario WHERE s.estado = 'aceptada' AND s.fechahasta < '$hoy' AND s.idcouch = $id ORDER BY s.fechahasta";
								if ($result = $conec->query ($cons))
									{  
										while ($usu = $result->fetch_assoc()) {
										$idud = $usu['idusuario'];
								?>
								<div class="usuarioHospede">
									<?php echo $usu['nombre'] . ' ' . $usu['apellido'] . ' ' . $usu['email']; 
									?>
								</div>
							</div>
							<?php 
							$con = "SELECT * FROM hacecomentario h WHERE h.idusuario= $idu AND h.idusuario2 = $idud";
								$resu=mysqli_query($conec, $con);
								$co = $resu->fetch_assoc();
								if(mysqli_num_rows($resu) == 0) { ?>
									<div class="campo">
										<form class="comentarios" method='POST' action="hacerComentarioUsu.php">
											<div class="puntaje">
											<select name="op"> 
												<option id="1" value="1">1</option>
												<option id="2" value="2">2</option>
												<option id="3" value="3">3</option>
												<option id="4" value="4">4</option>
												<option id="5" value="5">5</option>
											</select>
											</div>
											<div class="comentario">
											<br/>
												<input type="text" name="comentario">
											</div>
											<br/>
											<input type="hidden" name="idu" value="<?php echo $idu; ?>">
											<input type="hidden" name="idud" value="<?php echo $idud; ?>">
											<input type="hidden" name="idc" value="<?php echo $id; ?>">
											<input type="submit" value="Enviar"> 
										</form>
									</div>
							<?php } 
									else {
										echo $co['comentario'] . ' ' . $co['puntuacion'];
									}
									} } ?>
							</div>
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
<?php } }
else { header("Location:index.php");
}
?>