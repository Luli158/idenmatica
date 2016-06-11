<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
//Librerías para el envío de mail
include_once('class.phpmailer.php');
include_once('class.smtp.php');
include_once('connection.php');

//Recibir todos los parámetros del formulario
$para = $_POST['email'];
$conp= connection();
					$sql= "SELECT clave FROM usuarios WHERE email='$para'";
					$result=mysqli_query($conp, $sql);
					$u= $result->fetch_assoc();
					$clave=$u['clave'];
$asunto = "Recuperacion de su clave";
$mensaje = "Recuperacion de contrase&ntilde;a de $para<br/><br/>Su contrase&ntilde;a actual es:<br/><br/>$clave<br/><br/> Gracias, <br/>El equipo de CouchInn.";
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
$mail->Password = "couchinn123";

//Agregar destinatario
$mail->AddAddress($para);
$mail->Subject = $asunto;
$mail->Body = $mensaje;
//Para adjuntar archivo
//$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
$mail->MsgHTML($mensaje);

//Avisar si fue enviado o no y dirigir al index
if($mail->Send())
{
	echo'<script type="text/javascript">
			alert("Enviado Correctamente");
			window.location="http://localhost/ingresar.php"
		 </script>';
}
else{
	echo'<script type="text/javascript">
			alert("NO ENVIADO, intentar de nuevo");
			window.location="http://localhost/ingresar.php"
		 </script>';
}
?>
</body>
</html>

