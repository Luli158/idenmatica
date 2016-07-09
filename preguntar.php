<?php 

			include_once("connection.php");
			$conec=connection();
			$pregunta = $_POST['pregunta'];
			$idu = $_POST['idu'];
			$idc=$_POST['idc'];
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$hoy = date("Y-m-d");
			mysqli_query($conec,"INSERT INTO preguntas (pregunta, fechaPreg, idusuario, idcouch) VALUES ('$pregunta',  '$hoy', '$idu' , '$idc')");
			?>	
			
			<script type="text/javascript">
			window.location.href='detalles_couch.php?id=<?php echo $idc; ?>'; </script>
			
	