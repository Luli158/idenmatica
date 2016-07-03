<html>
	<head>
		<link rel= 'stylesheet' type= 'text/css' href= 'estilos.css' media='screen'>
		<script src='validarRecu.js'></script>
		<link rel="icon" type="img/png" href="img/Favicon.png" />
		<meta charset="utf-8">
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		<title>CouchInn</title>
	</head>
	<body>
	<?php include("menuu.php") ?>
		<div class='ingresar' id='ingresar'>
			<h1 style='color:6d6d6d'>Recuperar contrase&ntilde;a</h1>
			<form method='post' name='ingresar' action='#'>
				<p>Ingrese su email:&nbsp;&nbsp;&nbsp;&nbsp;<input type='email' name='email' id='email' required ></p> 
				<input type='submit' value='Recuperar contrase&ntilde;a' onClick='return validarRecu()'>
				<a href='ingresar.php'><input type='button' value='Volver'></a>
				<?php
			if ($_POST) { 
					$usuario= $_POST['email'];
					include_once ('connection.php');
					$conp= connection();
					$sql= "SELECT * FROM usuarios WHERE email='$usuario'";
					$result=mysqli_query($conp, $sql);
					$u= $result->fetch_assoc();
											
					if(mysqli_num_rows($result)==0){ ?>
												
						<script type="text/javascript"> alert ("El usuario no existe"); </script>
						<?php }
					else { 
							//Librerías para el envío de mail
							include_once('class.phpmailer.php');
							include_once('class.smtp.php');
							//Recibir todos los parámetros del formulario
							$clave=$u['clave'];
							$asunto = "Recuperacion de clave";
							$mensaje = "Recuperaci&oacute;n de contrase&ntilde;a de $usuario<br/><br/>Su contrase&ntilde;a actual es:<br/><br/>$clave<br/><br/> Gracias, <br/>El equipo de CouchInn.";
							//$archivo = $_FILES['hugo'];

							//Este bloque es importante
							$mail = new PHPMailer();
							$mail->IsSMTP();
							$mail->SMTPAuth = true;
							$mail->SMTPSecure = "ssl";
							$mail->Host = "smtp.gmail.com";
							$mail->Port = 465;

							//Nuestra cuenta
							$mail->Username ="couchinn1@gmail.com";
							$mail->Password = "1234couch";

							//Agregar destinatario
							$mail->AddAddress($usuario);
							$mail->Subject = $asunto;
							$mail->Body = $mensaje;
							//Para adjuntar archivo
							//$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
							$mail->MsgHTML($mensaje);

							//Avisar si fue enviado o no y dirigir al index
							if($mail->Send())
							{
								echo'<script type="text/javascript">
										alert("Se le ha enviado un correo a su casilla, con su contraseña actual");
										window.location="http://localhost/ingresar.php"
									 </script>';
							}
							else{
								echo'<script type="text/javascript">
										alert("NO ENVIADO, intentar de nuevo");
										window.location="http://localhost/ingresar.php"
									 </script>';
							}
					
					}				
				} ?>
			</form>
		</div>
	</body>
</html>
