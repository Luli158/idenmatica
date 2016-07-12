<?php 

			include_once("connection.php");
			$conec=connection();
			$respuesta = $_POST['respuesta'];
			$idp = $_POST['id'];
			$idc=$_POST['idc'];
			mysqli_query($conec,"UPDATE preguntas SET respuesta='$respuesta' WHERE idpregunta = $idp");
			
			$anterior = $_SERVER['HTTP_REFERER'];
			if (strpos($anterior,"detalles_couch.php")) { 
			?>	<script type="text/javascript">
			window.location.href='detalles_couch.php?id=<?php echo $idc; ?>'; </script>
			<?php	} else { ?>
			<script type="text/javascript">
				window.location.href='miCouch.php?id=<?php echo $idc; ?>'; </script>
			<?php } ?>
	
			
