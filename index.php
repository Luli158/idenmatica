<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  ?>
<html>
	<head>
	<script language="javascript" type="text/javascript" src="swfobject.js" ></script> 
		<link rel='stylesheet' type='text/css' href='estilos.css' media='screen'/>
		<script type='text/javascript' href='java.js'></script>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge"> <!-- For intranet testing only, remove in production. -->
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>CouchInn</title>
	</head>
	<body>
		<div>
		
				<?php
					require ("menu.php"); ?>
					
					<video src="viajar.mp4" autoplay loop muted >
					
					</video>
				<?php
				if(isset($_SESSION['estado'])) { 
					if ($_SESSION['admin']=='1') { ?>
							<div class="botonRegistro"><a class="textR" href="vistaba.php">Backend</a></div>
						<?php } } ?>
				
				<div id="textoindex">
							<a style="font-size:60px; font-weight:700;">UN LUGAR DONDE QUEDARTE</a> <br>
							<h3>Reserva alojamientos de anfitriones locales en más de 191 países y disfruta de la ciudad como un habitante más.<h3>
				</div>				
				
				<div class="formulario" style="background-image:url('img/fondof.png');">
				<form name="form1" action="buscar.php" method="post" onsubmit="return validarFecha()">
				<div class="form1">
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
							<div class="buscar"><input type="submit" value="Buscar"  style="background-color:#96ac3c"></div>
						</div>
					</form>
			</div>
		</div>
	</body>
		<footer>
				<div class="textofooter">couchinn@hotmail.com &nbsp; &nbsp; CouchInn© Derechos Reservados 2015-2017</div>
			</footer> 
</html>