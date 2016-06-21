<?php
	session_start();
	if($_SESSION['estado']!='logueado'){
		header('Location: ./ingresar.php?error=16');
	}
?>
<html>
	<head>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title>CouchInn</title>
		<script src="./validarCouch.js"></script>
		<link rel ='stylesheet' type='text/css' href='./estilos.css'>
	</head>
	<body>
		<?php
			include ('./menu.php');
		?>
		<div id="publicarcouch"> <!--que quede igual q registro-->
					<h2>Registar Couch</h2>
					<form enctype="multipart/form-data" method="POST" name="couch" action="./Vpublicar_couch.php">
						Titulo:</br>
						<input type="text" id="titulo" name="titulo" placeholder="Titulo"></br>
						Descripci&oacuten:</br>
						<textarea id="descripcion" name="descripcion" placeholder="Descripcion"></textarea></br>
						Ubicaci&oacuten:</br>
						<input type="text" id="ubicacion" name="ubicacion" placeholder="Ubicacion"></br>
						Capacidad:</br>
						<input type="number" id="capacidad" name="capacidad"></br>
						Tipo:</br>
						<div id="tipos" style="padding-left: 30px;">
							<select name="tipo" size=1>
							<?php
								include_once('./connection.php');
								$conec=connection();
								$resul=mysqli_query($conec,"SELECT * FROM tipos");
								while($tipo=mysqli_fetch_array($resul)){
									if('$tipo[bloqueado]=0'){
										echo "<option value=$tipo[idtipo]>$tipo[nombre]</option>";
									}
								}
								mysqli_close($conec);
							?>
							</select>
						</div>
						Seleccione las imagenes:</br>
						<input type="file" name="imagen[]" multiple="multiple"></br>
						<input type="submit" value="Publicar" onclick="return validarCouch()">
						<input type="button" value="Cancelar" onClick="window.location.href='index.php' ">
					</form>
		</div>
	</body>
</html>
