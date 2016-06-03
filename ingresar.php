<html>
	<head>
		<link rel= 'stylesheet' type= 'text/css' href= 'estilos.css' media='screen'>
		<script src='validarIngreso.js'></script>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<title>CouchInn</title>
	</head>
	<body background="img/fondoo.png">
		<div class='ingresar' id='ingresar'>
			<h1 style='color:6d6d6d'>Ingresar</h1>
			<form method='post' name='ingresar' action='#'>
				<p> Email:&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='email' id='email' value='<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>' required ></p> 
				<p> Clave:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='password' name='clave' id='clave' required></p>
				<input type='submit' value='Enviar' onClick='return validarIngreso()'>
				<a href='index.php'><input type='button' value='Volver'></a>
				<?php
			if ($_POST) { 
					$usuario= $_POST['email'];
					$clave = $_POST['clave'];
					include_once ('connection.php');
					$conp= connection();
					$sql= "SELECT * FROM usuarios WHERE email='$usuario'";
					$result=mysqli_query($conp, $sql);
					$u= $result->fetch_assoc();
											
					if(mysqli_num_rows($result)==0){ ?>
												
						<script type="text/javascript"> alert ("El usuario no existe"); </script>
						<?php }
					else { 
						$sql.= " AND clave='$clave'";
						$result=mysqli_query($conp, $sql);
						if (mysqli_num_rows($result)==0) {?>
							<script type="text/javascript"> alert ("La contraseña es incorrecta"); </script>
						<?php	}
						else { 
							session_start();
							$_SESSION['estado']="logueado";
							$_SESSION['usuario']= $u['idusuario'];
							if ($u['administrador'] == 1){ 
								$_SESSION['admin']=1;
								Header('Location: vistaba.php');
							}
							else {
								$_SESSION['admin']=0;
								Header('Location: index.php'); 
							}
						} 
					}				
				} ?>
			</form>
		</div>
	</body>
</html>
