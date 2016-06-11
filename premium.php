<?php
 session_start();
	
 if ($_SESSION['estado']=="logueado"){
?>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='estilos.css' media='screen'/>
		<script src="validarPremium.js"></script>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title>CouchInn</title>
	</head>
	<body background="img/fondoo.png">
	<?php include_once ("menu.php");?> 
		<div class='ingresar' id='premium' >
			<h1 style="color:FFFFFF"><img src='img/estrella.png' height='15px' width='15px'>
			<img src='img/estrella.png' height='15px' width='15px'>&nbsp;&nbsp;Pasate a Premium!&nbsp;
			<img src='img/estrella.png' height='15px' width='15px'>
			<img src='img/estrella.png' height='15px' width='15px'></h1>
			
			<a style="color:6d6d6d; font-size:25px;">Disfrutá de tus fotos en todas tus publicaciones</a><br><br>
			
			<form method='post' name='premium' action='#'>
				<p> Numero de tarjeta:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='number' name='numero' id='numero' required></p>
				<p> Codigo de seguridad:&nbsp;&nbsp;<input type='password' name='clave' id='clave' required></p>
				<input type='submit' value='Enviar' onClick='return validarPremium()'>
				<a href='index.php'><input type='button' value='Volver'></a>
	<?php if ($_POST) {
					include_once ("connection.php");
					$usuario= $_SESSION['usuario'];
					$conec=connection();
					$result=mysqli_query($conec, "SELECT * FROM usuarios WHERE idusuario='$usuario'");
					$p= $result->fetch_assoc();
					if($p['premium']=='1') { ?>
						<script type="text/javascript"> alert ("Usted ya es un usuario Premium"); window.location.href='index.php' </script>
						<a href="index.php">Volver</a>
					<?php
					}
					else { 
						date_default_timezone_set('America/Argentina/Buenos_Aires');
						$hoy = date("Y-m-d");
						$sql= "UPDATE usuarios SET premium='1', fechap='$hoy', costop='100' WHERE idusuario='$usuario' ";
						mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($conec));?>
						<script type="text/javascript"> alert ("El pago se realizo con exito"); window.location.href='index.php' </script>
						<?php
					}}?>
			</form>	
		</div>
	</body>
</html>
<?php } 
else {header("Location:ingresar.php");}
?>