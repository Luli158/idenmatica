<?php
	session_start();
	if($_SESSION['estado']!='logueado'){
		header('Location: ./ingresar.php?error=16');
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title>CouchInn</title>
		<link rel ='stylesheet' type='text/css' href='./estilos.css'>
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<div id="contenedor-registro"> <!--modificar como está el de registro -->
					<h2>Mis solicitudes:</h2>
					<?php
						include_once('./connection.php');
						$idusuario = $_SESSION['usuario'];
						$conec=connection();
						$consulta="SELECT * FROM solicitudes INNER JOIN couch ON (solicitudes.idcouch=couch.idcouch) WHERE solicitudes.idusuario=$idusuario";
						$resul=mysqli_query($conec,$consulta);
						if(mysqli_num_rows($resul)==0){
					?>
							<p>Usted no realiz&oacute ninguna solicitud</p>
					<?php
						}	
						else{			
							while($solicitud=mysqli_fetch_array($resul)){ 
					?>
								<div id="solicitud">
									<?php/*
										$idcouch=$solicitud['idcouch'];
										$consulta2="SELECT titulo FROM couch WHERE idcouch=$idcouch";
										$resul2=mysqli_query($conec,$consulta2);*/
									?>

									<!-- Acá empieza el campo TITULO DEL COUCH SOLICITADO -->

										<H3>Couch solicitado: </H3>
									<?php
										echo $solicitud['titulo'];

										//if(mysqli_num_rows($resul2)==0){
									?>
										<!--	<p>El Couch: --><?php // echo $solicitud['titulo'];?> <!-- ya fue eliminado.</p> -->

									<?php		
										/* } */
									?>

									<!-- Acá empieza el campo ESTADO -->

									<H3>Estado: </H3>
									<?php
										if($solicitud['estado'] == 'espera'){
									?>
											<p><?php echo ("en espera");?></p>
									<?php
										}
										else{
									?>
											<p><?php echo $solicitud['estado'];?></p>
									<?php
										}


									//Acá empieza el campo FECHA DE ACEPTACION


										if($solicitud['fechaaceptada'] != null){
									?>
											<H3>Fecha que se acept&oacute: </H3>
											<p><?php echo $solicitud['fechaaceptada'];?></p>
									<?php
										}


									//Acá empieza el campo COMENTARIO



										if($solicitud['comentariosolicitud'] != ''){
									?>
											<H3>Comentario: </H3>
											<p><?php echo $solicitud['comentariosolicitud'];?></p>
									<?php
										}
									?>

									<!-- Acá empieza el campo LLEGADA -->

									<H3>Llegada: </H3>
									<p><?php echo $solicitud['fechadesde'];?></p>

									<!-- Acá empieza el campo SALIDA -->

									<H3>Salida: </H3>
									<p><?php echo $solicitud['fechahasta'];?></p>

								</div>
								</br>
					<?php
							}
						}
					?>
					<input type="button" value="Volver" onClick="window.location.href='index.php'">
				</div>
			</section>
		</div>
	</body>
</html>