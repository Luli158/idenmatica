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
	<body background="img/fondoo.png">
		<div class='fondo'>
			<?php
				require ("menu.php"); ?>
				<div class='menuba'>
					<div class='tabla'>
						<div class='columnaba'>
							<div class='tituloba'>
								<a> MIS COUCHES </a>
							</div>
							<?php 
								$conp= connection();
								$id= $_SESSION['usuario'];
								$sql= "select * from couch c INNER JOIN usuarios u ON c.idusuario = u.idusuario WHERE c.idusuario = $id ";
								if ($result= $conp->query ($sql))
									{
										while ($couches= $result->fetch_assoc()){
							?> 
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
								<div class='textoba'>
								<a href='miCouch.php?id=<?php echo $couches['idcouch']; ?>'><?php echo $couches['titulo'];?></a>
								<?php 
								$idc= $couches['idcouch'];;
								$s = $conp->query("SELECT * FROM solicitudes s WHERE s.idcouch = $idc AND s.estado = 'espera'");
									if (mysqli_num_rows($s) > 0){ ?>
								<a href="javascript:preguntars(<?php echo $couches["idcouch"]?>)"><img src="img/eliminar.png" width=15px height=15px></a>
								<?php }
								else { ?>
								<a href="javascript:preguntar(<?php echo $couches["idcouch"]?>)"><img src="img/eliminar.png" width=15px height=15px></a>
								<?php } ?>
								<form method="GET" name="bloquear" action="Vbloquear_tipo.php">
						<?php
    						if($couches['despublicado'] ==0){
    					?>
    							<div class="campo">
    								<input type="hidden" name="id" value="<?php echo $couches["idcouch"]; ?>">
    								<input type="hidden" name="bloqueado" value="1">
									<input type="submit" value="Despublicar">
    							</div>
    					<?php
    						}
    						else{
    					?>
    							<div class="campo">				
    								<input type="hidden" name="id" value="<?php echo $couches["idcouch"]; ?>">
    								<input type="hidden" name="bloqueado" value="0">
									<input type="submit" value="Publicar">
    							</div>
    					<?php
    						}
    					?>
    			</form>
								</div>
							<?php
								}} 
							?>
							
						</div>
						</div>
					</div>
				</div>
	</body>
</html>
<?php }
else { header("Location:index.php");
}
?>