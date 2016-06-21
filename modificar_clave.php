<?php
	session_start();
	if($_SESSION['estado']!='logueado'){
		header('Location: ./ingresar.php?error=16');
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<script src="./validarClave.js"></script>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title>CouchInn</title>
		<link rel ='stylesheet' type='text/css' href='./estilos.css'>
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<div id="contenedor-registro"> <!--modificar como está el de registro -->
					<h2>Modificar Clave</h2>
					<form method="POST" name="cambiarclave" action="./Vmodificar_clave.php">
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
						<input type="hidden" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>"></br>
						<input type="hidden" id="apellido" name="apellido" value="<?php echo $usuario['apellido']; ?>"></br>

						Clave actual:</br>
						<input type="text" id="clave" name="clave"></br>
						<input type="hidden" id="claveactual" name="claveactual" value="<?php echo $usuario['clave']; ?>"></br>

						Clave nueva:</br>
						<input type="password" id="pass" name="pass"></br>
						Repita la Clave:</br>
						<input type="password" id="pass2" name="pass2"></br>

						<input type="hidden" id="dni" name="DNI" value="<?php echo $usuario['documento']; ?>"></br>
						<input type="hidden" id="fechanac" name="fechanac" value="<?php echo $fecha ?>"></br>
						<input type="hidden" id="direccion" name="direccion" value="<?php echo $usuario['direccion']; ?>"></br>
						<input type="hidden" id="premium" name="premium" value="<?php echo $usuario['premium']; ?>"></br>
						<input type="hidden" id="fechap" name="fechap" value="<?php echo $usuario['fechap']; ?>"></br>
						<input type="hidden" id="costop" name="costop" value="<?php echo $usuario['costop']; ?>"></br>
						<input type="hidden" id="admin" name="admin" value="<?php echo $usuario['administrador']; ?>"></br>
						<input type="submit" value="Modificar clave" onclick="return validarClave()">
						<input type="button" value="Cancelar" onClick="window.location.href='modificar_perfil.php' ">
					</form>
				</div>
			</section>
		</div>
	</body>
</html>