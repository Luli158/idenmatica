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
	<body>
		<div class="fondo">
		<div class="contenido">
			<?php	require ("menuu.php");
			if(isset($_SESSION['estado'])) { 
					if ($_SESSION['admin']=='1') 
					{ ?>
						<div class="botonRegistro"><a class="textR" href="vistaba.php">Backend</a></div>
					<?php } }?>
				<br>
			<div class="formulario" style="background-color:#96ac3c">
				<form name="form1" action="buscar.php" method="post" onsubmit="return validarFecha()">
				<div class="form1" style="background-color:#96ac3c">
					<div class="buscar"><input type="text" name="texto" placeholder="Titulo, descripci&oacute;n, zona" style=" width:150px;"></div>
					<?php		include_once ("connection.php");
									$conp=connection();
									$sql= "select * from tipos";
									if ($result= $conp->query ($sql))
										{
											?>
							<div class="buscar"><select name="tipo" style="width:125px; height: 50px; color:#aaa6a6;">
								<option value="null">Tipo de Couch</opcion>
								<?php while ($tipo= $result->fetch_assoc()){?>
								<option value="<?php echo $tipo['idtipo']; ?>"
								<?php if (isset($_GET['tipo'])) {$ti=$_GET['tipo']; if ($tipo['idtipo']==$ti){ echo "selected='selected' "; } } ?>><?php echo $tipo['nombre']; ?></option><?php }?>
							</select><?php } ?></div>
							<div class="buscar"><input type="number" name="cantpersonas" placeholder="Integrantes"></div>
							<div class="buscar"><input type="text" name="fechad" id="fechaDesde" placeholder="Desde" onfocus="(this.type='date')" onblur="(this.type='text')"></div>
							<div class="buscar"><input type="text" name="fechah" id="fechaHasta"   placeholder="Hasta" onfocus="(this.type='date')" onblur="(this.type='text')"></div>
							<div class="buscar"><input type="submit" value="Buscar"  ></div>
						</div>
					</form>
			</div>
			<div class="couches">
					<?php
									include_once ("busqueda.php");
									$couches = getCouches(); 

									if ($resultado = mysqli_query ($conp,$couches))
									{ 
										if (mysqli_num_rows($resultado) == 0) {
										 ?> <br><h1 style="text-align:center"> No se encontraron coincidencias </h1> <?php 
										}
										else {
												while ($couch = mysqli_fetch_assoc($resultado))
												{ 
								?>
									<div class="cou">
									<div class="campoci">
												<?php 
													$detalle = $couch['idcouch']; 
													$sql="SELECT * FROM usuarios WHERE idusuario= $couch[idusuario]";
													$res =mysqli_query($conp,$sql);
													$resul=mysqli_fetch_array($res);
													
													$consultaimagenes="SELECT * FROM imagenescouches WHERE idcouch='$detalle' ORDER BY idcouch";
													$resulimagenes=mysqli_query($conp,$consultaimagenes);
													if ($resul ['premium'] == 0) { ?>
													<a href="detalles_couch.php?id=<?php echo $detalle;?>">
													<div class="imglogo">
														<img src="img/logo.png" style="position:center; width:100%; margin-top:30%;" >
													</div>
													</a>
															
																<?php
													}
													else if (mysqli_num_rows($resulimagenes) == 0) { ?>
													<a href="detalles_couch.php?id=<?php echo $detalle;?>">
													<div class="imglogo">
														<img src="img/logo.png" style="position:center; width:100%; margin-top:30%;" >
													</div>
													</a>
													<?php } else {
													$imagen=mysqli_fetch_array($resulimagenes);
													$ruta= "./" . $imagen['rutaimagen'];
													?>
													
													<div>
														<a href="detalles_couch.php?id=<?php echo $detalle;?>"><img style="background-image: url(<?php echo $ruta ?>); background-position:center; background-repeat: no-repeat; background-size: cover; width:100%; height:305px;" ></a>
													</div>
													
													<?php
													}

												?> 
												</div>
											<div>
											<p class="parrafo"><a class="tituloc"><?php echo $couch['titulo']; ?></a>
									
											<a class="campoc" style="line-height: 140%;">											
											<?php echo ' - Ubicaci&oacute;n: ' . $couch['ubicacion'] . '.' ?> </a> 
											<a class="campoc" style="line-height: 140%;"> <?php echo 'Con capacidad para ' . $couch['cantpersonas'] . ' personas.'?>
											</a><p></div>
											
								
											
									</div>
									
								<?php } } }
								?>
						
				</div>	
				</div>
		    <!--<div class=pie>
				<a>couchinn@hotmail.com &nbsp; &nbsp; CouchInn© Derechos Reservados 2015-2017</a>
			</div> -->
		</div>
	</body>
</html>