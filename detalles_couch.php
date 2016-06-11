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
				<div class="campo">
						<input type="button" value="Volver" onClick="window.location.href='buscar.php' ">
					</div>
					<br>
				</div>
			</div>
		</div>
		<?php
			mysqli_close($conec);
		?>
	</body>
</html>