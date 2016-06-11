<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  ?>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='estilos.css' media='screen'/>
		<script type='text/javascript' href='java.js'></script>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>CouchInn</title>
	</head>
	<body background="img/fondoo.png">
		<div class="fondo">
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
				<form name="form1" action="buscar.php" method="post">
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
							<div class="buscar">Fecha desde: <input type="date" name="fechad"></div>
							<div class="buscar">Fecha hasta: <input type="date" name="fechah"></div>
							<div class="buscar"><input type="submit" value="Buscar"></div>
						</div>
					</form>
			</div>
			<div class="couches">
					<?php
					/*	$sql= "select * from couch c INNER JOIN tipos t where c.idtipo = t.idtipo";
								if ($result= $conp->query ($sql))
									{ while ($couch=$result->fetch_assoc()){ */
									include_once ("busqueda.php");
									$couches = getCouches(); 
									while ($couch = mysqli_fetch_assoc($couches))
									{ 
					?>
						<div class="cou">
								<div class="titulo">
								<?php echo $couch['titulo'] ?><br>
								</div>
								<div class="descripciondet">
									<?php echo $couch['descripcion'];?>
								</div>
								<div class="descripciondet">
									Tipo de Couch: <?php echo $couch['nombre'];?>
								</div>
								<div class="descripciondet">
									Ubicacion: <?php echo $couch['ubicacion'];?>
								</div>
								<div class="descripciondet">
									Capacidad: <?php echo $couch['cantpersonas'];?>
								</div>
								<div class="det">
								<?php $detalle = $couch['idcouch']; ?>
									<a style="text-decoration:none" href="detalles_couch.php?id=<?php echo $detalle;?>">Detalles...</a>
								</div>
						</div>
								<?php } ?>
						
				</div>	
		    <!--<div class=pie>
				<a>couchinn@hotmail.com &nbsp; &nbsp; CouchInn© Derechos Reservados 2015-2017</a>
			</div> -->
		</div>
	</body>
</html>