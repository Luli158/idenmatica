<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title>Registrarse</title>
		<link rel="stylesheet" type="text/css" href="./estilos.css">
		<script src="validarRegistro.js"></script>
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			</br>
			<section>
				<div id="registro">
					<div class='titulo'>
						<h1>Registrarse en CouchInn</h1>
					</div>
					<form method="POST" name="registro" action="Vregistrar_usuario.php">
						<div class="campo">
							Correo electronico:</br>
							<input type="email" id="email" name="user" placeholder="Correo"></br>
						</div>
						</br>
						<div class="campo">
							Clave:</br>
							<input type="password" id="pass" name="pass" placeholder="Clave" value="<?php if (isset($_SESSION['pass'])) echo $_SESSION['pass']; ?>"></br>
						</div>
						</br>
						<div class="campo">
							Repita la Clave:</br>
							<input type="password" id="pass2" name="pass2" placeholder="Clave" value="<?php if (isset($_SESSION['pass'])) echo $_SESSION['pass']; ?>"></br>
						</div>
						</br>
						<div class="campo">
							Nombre:</br>
							<input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php if (isset($_SESSION['nombre'])) echo $_SESSION['nombre']; ?>"></br>
						</div>
						</br>
						<div class="campo">
							Apellido:</br>
							<input type="text" id="apellido" name="apellido" placeholder="Apellido" value="<?php if (isset($_SESSION['apellido'])) echo $_SESSION['apellido']; ?>"></br>
						</div>
						</br>
						<div class="campo">
							Fecha de nacimiento:</br>
							<input type="date" id="nacimiento" name="nacimiento" value="<?php if (isset($_SESSION['nacimiento'])) echo $_SESSION['nacimiento']; ?>"></br>
						</div>
						</br>
						<div class="campo">
							DNI:</br>
							<input type="text" id="dni" name="DNI" placeholder="DNI" value="<?php if (isset($_SESSION['DNI'])) echo $_SESSION['DNI']; ?>"></br>
						</div>
						</br>
						<div class="campo">
							Direcci&oacuten:</br>
							<input type="text" id="direccion" name="direccion" placeholder="Dirección" value="<?php if (isset($_SESSION['direccion'])) echo $_SESSION['direccion']; ?>"></br>
						</div>
						<input type="hidden" id="premium" name="premium" value="0"></br>
						<input type="hidden" id="admin" name="admin" value="0"></br>
						<div class="campo">
						<input type="submit" value="Registrarme" onclick="return validarRegistro()">
						<input type="button" value="Cancelar" onClick="window.location.href='index.php' ">
						</div>
					</form>
					</br>
				</div>
			</section>
			<aside>
			</aside>
		</div>
	</body>
</html>