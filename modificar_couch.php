<?php
	session_start();
	if($_SESSION['estado']!='logueado'){
		header('Location: ./ingresar.php?error=16');
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<script src="./validarCouch.js"></script>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title>CouchInn</title>
		<link rel ='stylesheet' type='text/css' href='./estilos.css'>
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<div id="contenedor-registro"> <!--modificar como está el de registro -->
					<h2>Modificar Couch</h2>
					<form method="POST" name="couch" action="./Vmodificar_couch.php">
						<?php
							include_once('./connection.php');
							$idcouch = $_GET['id'];
							$conec=connection();
							$resul=mysqli_query($conec,"SELECT * FROM couch WHERE idcouch=$idcouch");
							$couch=mysqli_fetch_array($resul);
						?>
						<input type="hidden" id="idcouch" name="idcouch" value="<?php echo $idcouch; ?>"></br>
						<input type="hidden" id="fecha" name="fecha" value="<?php echo $couch['fecha']; ?>"></br>
						Titulo:</br>
						<input type="text" id="titulo" name="titulo" value="<?php echo $couch['titulo']; ?>"></br>
						Descripci&oacuten:</br>
						<textarea id="descripcion" name="descripcion">"<?php echo $couch['descripcion']; ?>"</textarea></br>
						Ubicaci&oacuten:</br>
						<input type="text" id="ubicacion" name="ubicacion" value="<?php echo $couch['ubicacion']; ?>"></br>
						Capacidad:</br>
						<input type="number" id="capacidad" name="capacidad" value="<?php echo $couch['cantpersonas']; ?>"></br>
						Tipo:</br>
						<div id="tipos" style="padding-left: 30px;">
							<select name="tipo" size=1>
								<?php
									include_once('./connection.php');
									$conec=connection();
									$resul=mysqli_query($conec,"SELECT * FROM tipos");
									while($tipo=mysqli_fetch_array($resul)){
										if($tipo['idtipo']==$couch['idtipo']){
								?>
											<option value=<?php echo $tipo['idtipo'];?> selected><?php echo $tipo['nombre'];?></option>;
								<?php
										}
										else{ 		
											if('$tipo[bloqueado]=0'){
								?>
												<option value=<?php echo $tipo['idtipo'];?> > <?php echo $tipo['nombre'];?></option>
								<?php
											}
										}
									}
									mysqli_close($conec);
								?>
							</select>
						</div>
						<input type="submit" value="Modificar" onclick="return validarCouch()">
						<input type="button" value="Cancelar" onClick="window.location.href='index.php' ">
					</form>
				</div>
			</section>
		</div>
	</body>
	<!-- EXPLICAR EN LA SECCION DE AYUDA QUE PARA MODIFICAR LAS FOTOS HAY QUE CREAR UN COUCH NUEVO -->
</html>