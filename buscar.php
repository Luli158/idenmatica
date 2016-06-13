<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  ?>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='estilos.css' media='screen'/>
		<script type='text/javascript' href='java.js'></script>
		<script type='text/javascript' src='verificarFecha.js'></script>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>CouchInn</title>
	</head>
	<body background="img/fondoo.png">
		<div class="fondo">
		<div class="contenido">
			<?php	require ("menu.php");
				if(!isset($_SESSION['estado'])) 
				{ ?>
				<div class="botonRegistro"><a class="textR" href="registro.php">Registrarse</a></div>
				<?php 
				}
				else 
				{
					if ($_SESSION['admin']=='1') 
					{ ?>
						<div class="botonRegistro"><a class="textR" href="vistaba.php">Backend</a></div>
					<?php } 
					else { ?> <br><br> <?php } 
				} ?>
				<br>
			<div class="formulario">
				<form name="form1" action="buscar.php" method="post" onsubmit="return validarFecha()">
				<div class="form1">
					<div class="buscar">Buscar: <input type="text" name="texto"></div>
					<?php		include_once ("connection.php");
									$conp=connection();
									$sql= "select * from tipos";
									if ($result= $conp->query ($sql))
										{
											?>
							<div class="buscar">Tipo de Couch: <select name="tipo">
								<option value="null">Todos</opcion>
								<?php while ($tipo= $result->fetch_assoc()){?>
								<option value="<?php echo $tipo['idtipo']; ?>"
								<?php if (isset($_GET['tipo'])) {$ti=$_GET['tipo']; if ($tipo['idtipo']==$ti){ echo "selected='selected' "; } } ?>><?php echo $tipo['nombre']; ?></option><?php }?>
							</select><?php } ?></div>
							<div class="buscar">Fecha desde: <input type="date" name="fechad" id="fechaDesde"></div>
							<div class="buscar">Fecha hasta: <input type="date" name="fechah" id="fechaHasta"></div>
							<div class="buscar"><input type="submit" value="Buscar"></div>
						</div>
					</form>
			</div>
			<div class="couches">
					<?php
									include_once ("busqueda.php");
									$couches = getCouches(); 
									
									if ($resultado = mysqli_query ($conp,$couches))
									{ 
									while ($couch = mysqli_fetch_assoc($resultado))
									{ 
					?>
						<div class="cou">
								<div class="tituloc">
								<?php echo $couch['titulo'] ?><br>
								</div>
								<div class="campoc">
									<?php 
									$letras = 60;
									 if(strlen($couch['descripcion'])>=$letras){
									echo substr($couch['descripcion'],0, $letras)."..."; 
									}
									else 
									{ 
									echo $couch['descripcion']; 
									}
									?>
								</div>
								<div class="campoc">
									Tipo de Couch: <?php echo $couch['nombre'];?>
								</div>
								<div class="campoc">
									Ubicacion: <?php echo $couch['ubicacion'];?>
								</div>
								<div class="campoc">
									Capacidad: <?php echo $couch['cantpersonas'];?>
								</div>
								<div class="campoc">
								<?php $detalle = $couch['idcouch']; ?>
									<a style="text-decoration:none" href="detalles_couch.php?id=<?php echo $detalle;?>">Detalles...</a>
								</div>
						</div>
								<?php } }
								else { ?> <h1> No se encontraron coincidencias </h1> <?php }?>
						
				</div>	
				</div>
		    <!--<div class=pie>
				<a>couchinn@hotmail.com &nbsp; &nbsp; CouchInn© Derechos Reservados 2015-2017</a>
			</div> -->
		</div>
	</body>
</html>