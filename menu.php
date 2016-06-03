<?php 
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  ?>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='estilos.css' media='screen'/>
		<link rel="icon" type="image/png" href="Favicon.png" />
		<title>CouchInn</title>
	</head>
	<body>
			<div class=menu>
				<div class=mi-menu>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="quienes.php">QUI&Eacute;NES SOMOS</a></li>
					</ul>
				</div>
				<div class=mi-menuL>
					<a href="index.php"><img class="logo" src="img/logo.png"></a>
				</div>
				<div class=mi-menu>
					<ul>
						<?php if(isset($_SESSION['estado'])){
										include_once ('connection.php');
										$usuario=$_SESSION['usuario'];
										$conec=connection();
										$result=mysqli_query($conec, "SELECT * FROM usuarios WHERE idusuario='$usuario'");
										$p= $result->fetch_assoc();
										if ($p['premium']=='1') {?>
											<li><a onClick='alert("Usted ya es usuario Premium")'><img src='img/estrella.png' height='15px' width='15px'>&nbsp;PREMIUM&nbsp;<img src='img/estrella.png' height='15px' width='15px'></a></li><?php }
										else{?><li><a href="premium.php">PREMIUM</a></li><?php }}
									else{?><li><a href="premium.php" onClick='alert("Debe iniciar sesión para acceder al servicio Premium")'>PREMIUM</a></li><?php }?>
									
						<?php if(isset($_SESSION['estado'])) { ?><li><a href="cerrar.php">CERRAR SESI&Oacute;N</a><a><?php if(isset($_SESSION['estado'])){ echo $p['email']; }?></a></li><?php } 
																	else{ ?><li><a href="ingresar.php">INICIAR SESI&Oacute;N</a></li><?php } ?>
					</ul>
				</div>
			</div>
			<?php
			include('excepciones.php');
		?>
	</body>
</html>