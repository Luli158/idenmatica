<html>
	<head>
		<script src="./validarSolicitud.js"></script>
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
			include_once("./connection.php");
			$conec=connection();
			$id=$_GET['id'];
			$consulta=mysqli_query($conec,"SELECT * FROM couch INNER JOIN tipos ON (couch.idtipo = tipos.idtipo) WHERE idcouch=$id");
			$couch=mysqli_fetch_array($consulta);
			$consulta="SELECT * FROM solicitudes INNER JOIN usuarios ON (solicitudes.idusuario = usuarios.idusuario) WHERE idsolicitud=$id"; /* junta la tabla solicitudes y usuarios, pero el campo que tienen en común llamado idusuario no se repite.. la condicion del ON es el punto en que se unen ambas tablas */
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
					$iduc = $couch['idusuario'];
						$consulta=mysqli_query($conec,"SELECT nombre, apellido FROM usuarios WHERE idusuario= '$iduc'");
						$dueño=mysqli_fetch_array($consulta);
						echo $dueño['nombre'];
					?> &nbsp
					<?php 
						echo $dueño['apellido'];
					?>
					</p>
				</div>
				
				</br>
					</br>
					</br></br>
					</br>
					</br>

 <?php 			
 				if(!isset($_SESSION)) {
					session_start();
				}
				if(isset($_SESSION['usuario']) && $_SESSION['usuario'] != $couch['idusuario']) {
					$c="SELECT * FROM solicitudes WHERE idcouch = '$id' AND idusuario = '$_SESSION[usuario]'";
					$r=mysqli_query($conec,$c);
					if(mysqli_num_rows($r)==0) {
					
?>				
					</br>
					</br>
					</br>
					
						<div class="campo">
						<div id="solicitud">
							<div id="crear_solicitud">
							<b>Solicitar Couch:</b>
								<form method="POST" name="solicitar" action="./Venviar_solicitud.php">
									<p>Llegada:</p>
									<input type=date id="llegada" name="llegada">
									<p>Salida:</p>
									<input type=date id="salida" name="salida">
									<p>Comentario:</p>
									<textarea id="comentariosol" name="comentariosol" rows="6" cols="50" maxlength="1000" placeholder="Opcional"></textarea>
									<input type="hidden" name="idcouch" value="<?php echo $id; ?>">
									<input type="button" value="Enviar Solicitud" onclick="validarSolicitud(event)">
								</form>
							</div>
						</div>
						</div>
<?php						
					}
				}
?>
					<p><a style='cursor: pointer;' onclick="muestra_oculta('mostrarOcultar')" title="">Calificaciones</a></p>	
					<div id="mostrarOcultar" style='display:none;'>
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
				
				if (isset($_SESSION)){
				$idu = $_SESSION['usuario'];
				date_default_timezone_set('America/Argentina/Buenos_Aires');
				$hoy = date("Y-m-d");
				$sq=("SELECT * FROM solicitudes s INNER JOIN usuarios u ON s.idusuario = u.idusuario WHERE s.estado = 'aceptada' AND s.idusuario = '$idu' AND s.fechahasta < '$hoy'");
				$result=mysqli_query($conec, $sq);
				$result->fetch_assoc();
					if(mysqli_num_rows($result) != 0) { 
					$con = "SELECT * FROM comentarios c WHERE c.idusuario= $idu AND c.idcouch = $id";
						$resu=mysqli_query($conec, $con);
						$co = $resu->fetch_assoc();
						if(mysqli_num_rows($resu) == 0) { ?>
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
				<?php } 
				else {
					echo $co['comentario'] . ' ' . $co['puntuacion'];
					}
				} } ?>
			</div>
				
				<p><a>Preguntas</a></p>
				<div id="preguntas">
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
										if ($idu == $iduc) { ?>
										 <form method='post' name='responder' action='responder.php'>
										 <input type='text' name='respuesta' id='respuesta'>
										 <input type='hidden' name='id' id='id' value='<?php echo $preg['idpregunta']; ?>'>
										 <input type='hidden' name='idc' id='idc' value='<?php echo $id; ?>'>
										 <input type='submit' value='Responder'> 
										 </form>
							<?php	} }?>	
					</div>
					<?php } } ?>
				</div>
				<div class="campo">
					<?php if ($idu != $iduc) { ?>
						<form method='post' name='preguntar' action='preguntar.php'>
										 <input type='text' name='pregunta' id='pregunta'>
										  <input type='hidden' name='idu' id='idu' value='<?php echo $idu; ?>'>
										 <input type='hidden' name='idc' id='idc' value='<?php echo $id; ?>'>
										 <input type='submit' value='Preguntar'> 
										 </form>
				<?php	} ?>
				</div>
				</div>
				
				<div class="campo">
					<input type="button" value="Volver" onClick="window.location.href='buscar.php'">
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