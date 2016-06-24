<?php
	session_start();
	if($_SESSION['estado']!='logueado'){
		header('Location: ./ingresar.php?error=16');
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<script src="./validarPerfil.js"></script>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title>CouchInn</title>
		<link rel ='stylesheet' type='text/css' href='./estilos.css'>
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<div id="contenedor-registro"> <!--modificar como está el de registro -->
					<h2>Modificar perfil</h2>
					<form method="POST" name="mperfil" action="./Vmodificar_perfil.php">
						<?php
							include_once('./connection.php');
							$idusuario = $_SESSION['usuario'];
							$conec=connection();
							$resul=mysqli_query($conec,"SELECT * FROM usuarios WHERE idusuario='$idusuario'");
							$usuario=mysqli_fetch_array($resul);
							$fecha=$usuario['fechanac'];
						?>
						Usuario: <?php echo $usuario['email']; ?></br>&nbsp</br>
						<input type="hidden" id="email" name="user" value="<?php echo $usuario['email']; ?>"></br>
						Nombre:</br>
						<input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>"></br>
						Apellido:</br>
						<input type="text" id="apellido" name="apellido" value="<?php echo $usuario['apellido']; ?>"></br>
						</br>
						<input type="button" value="Cambiar clave" onClick="window.location.href='modificar_clave.php'"></br>
						</br>
						DNI:</br>
						<input type="number" id="dni" name="DNI" value="<?php echo $usuario['documento']; ?>"></br>
						Fecha de nacimiento:</br> (aaaa-mm-dd)</br>
						<input type="date" id="fechanac" name="fechanac" value="<?php echo $fecha ?>"></br>
						Direcci&oacuten:</br>
						<input type="text" id="direccion" name="direccion" value="<?php echo $usuario['direccion']; ?>"></br>
						<input type="hidden" id="premium" name="premium" value="<?php echo $usuario['premium']; ?>"></br>
						<input type="hidden" id="fechap" name="fechap" value="<?php echo $usuario['fechap']; ?>"></br>
						<input type="hidden" id="costop" name="costop" value="<?php echo $usuario['costop']; ?>"></br>
						<input type="hidden" id="admin" name="admin" value="<?php echo $usuario['administrador']; ?>"></br>
						<input type="submit" value="Modificar" onclick="return validarPerfil()">
						<input type="button" value="Cancelar" onClick="window.location.href='index.php' ">
					</form>
				</div>
			</section>
		</div>
	</body>
</html>