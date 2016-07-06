<?php
	session_start();
	if($_SESSION['estado']=='logueado'){
?>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='estilos.css' media='screen'/>
		<script type='text/javascript' href='java.js'></script>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge"> <!-- For intranet testing only, remove in production. -->
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title>CouchInn</title>
	</head>
	<body>
		<div class='fondo'>
			<?php
				require ("menuu.php"); ?>
					<div class='tituloba'>
						<a> MIS COUCHES </a>
					</div>
					<script language="Javascript">
						function preguntar(idcouch){
							eliminar=confirm("¿Esta seguro que desea eliminar este Couch? ");
							if (eliminar)
								window.location.href = "eliminarMiC.php?id=" + idcouch; 
							}
								
						function preguntars(idcouch){
							eliminar=confirm("¿El Couch tiene solicitudes sin responder, esta seguro que desea eliminarlo? ");
							if (eliminar)
								window.location.href = "eliminarMiC.php?id=" + idcouch; 
						}
					</script>
					<div class="couches">
						<?php 
							$conp= connection();
							$id= $_SESSION['usuario'];
							$sql= "select * from couch c INNER JOIN usuarios u ON c.idusuario = u.idusuario WHERE c.idusuario = $id ";
							if ($result= $conp->query ($sql))
								{
								while ($couch= $result->fetch_assoc()){
					?> 
						<div class="cou" style="height:400px;">
							<div class="campoci">
							<?php 
									$detalle = $couch['idcouch']; 
									$consultaimagenes="SELECT * FROM imagenescouches WHERE idcouch='$detalle' ORDER BY idcouch";
									$resulimagenes=mysqli_query($conp,$consultaimagenes);
									if (mysqli_num_rows($resulimagenes) == 0) 
									{?>
										<a href="miCouch.php?id=<?php echo $detalle;?>">
													<div class="imglogo">
														<img src="img/logo.png" style="position:center; width:100%; margin-top:30%;" >
													</div>
													</a>
									<?php
									}
									else
										{ 
										
										$imagen=mysqli_fetch_array($resulimagenes);
													$ruta= "./" . $imagen['rutaimagen'];
													?>
										<div>
											<a href="miCouch.php?id=<?php echo $detalle;?>"><img style="background-image: url(<?php echo $ruta ?>); background-position:center; background-repeat: no-repeat; background-size: cover; width:100%; height:305px;" ></a>
										
										</div>			
									<?php } ?> 
							</div>
							<div>
								<div class="parrafo" style="height:60px;"><a class="tituloc"><?php echo $couch['titulo']; ?></a>
									<a class="campoc" style="line-height: 140%;"><?php echo ' - Ubicaci&oacute;n: ' . $couch['ubicacion'] . '.'?> </a> 
									<a class="campoc" style="line-height: 140%;"> <?php echo 'Con capacidad para ' . $couch['cantpersonas'] . ' personas.'?></a></div>
							</div>	
					<div class="ceditar"  style="margin-bottom:0px;">
					<div>
					<a href="modificar_couch.php?id=<?php echo $detalle; ?>"><img src="img/modificar.png" width=15px height=15px></a>
					</div>
						<?php 
							$idc= $couch['idcouch'];;
							$s = $conp->query("SELECT * FROM solicitudes s WHERE s.idcouch = $idc AND s.estado = 'espera'");
							if (mysqli_num_rows($s) > 0){ ?>
							<div><a href="javascript:preguntars(<?php echo $couch["idcouch"]?>)"><img src="img/eliminar.png" width=15px height=15px></a></div>
							<?php }
							else { ?>
								<div><a href="javascript:preguntar(<?php echo $couch["idcouch"]?>)"><img src="img/eliminar.png" width=15px height=15px></a></div>
							<?php } ?>
							<div>
							<form method="GET" name="bloquear" action="Vbloquear_tipo.php">
							<?php
    						if($couch['despublicado'] ==0){
							?>
    						
    								<input type="hidden" name="id" value="<?php echo $couch["idcouch"]; ?>">
    								<input type="hidden" name="bloqueado" value="1">
									<input type="submit" value="Despublicar"> 
					
    					<?php
    						} 
    					else {
    					?>
    										
    								<input type="hidden" name="id" value="<?php echo $couch["idcouch"]; ?>">
    								<input type="hidden" name="bloqueado" value="0">
									<input type="submit" value="Publicar">
						
    					<?php
    						}
    					?> 
							</form></div>
					</div>
				</div>
					<?php } } 
								?>						
				</div>
			</div>
						
	</body>
</html>
<?php }
else { header("Location:index.php");
}
?>