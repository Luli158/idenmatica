<?php 

function enviarA ($de, $para, $cou, $fecd, $fech)
{
	include_once ("connection.php");
	$con= connection();
$cond ="SELECT * FROM usuarios WHERE idusuario = $para"; //DATOS DEL QUE MANDO SOLICITUD
$usde = $con->query($cond);
$ude= $usde->fetch_assoc();


$conp ="SELECT email FROM usuarios WHERE idusuario = $de"; //DATOS DEL QUE RECHAZO SOLICITUD
$uspara = $con->query($conp);
$upara= $uspara->fetch_assoc();

$usupara = $upara['email'];

$res= $con->query ("SELECT * FROM couch WHERE idcouch = $cou ");
$couch = $res->fetch_assoc();
$c=$couch['titulo'];
$idc=$couch['idcouch'];

//Librerías para el envío de mail
							include_once('class.phpmailer.php');
							include_once('class.smtp.php');
							//Recibir todos los parámetros del formulario
							$asunto = "Han rechazado su solicitud";
							$ape= $ude['apellido'];
							$nom = $ude['nombre'];
							$dir = $ude['direccion'];
							$dni = $ude['documento'];
							$tel = $ude['telefono'];
							$fecnac= $ude['fechanac'];
							$email = $ude['email'];
							$mensaje = 
							"<html>
							<head> Han rechazado su solicitud para el Couch: </head>
							<body>
								 <a href='http://localhost/detalles_couch.php?id=$idc'> $c </a><br/> <br/>
								 Desde el dia: $fecd al dia $fech<br/><br/>
								
								Gracias, <br/>El equipo de CouchInn.
							</body>
							</html>";
								
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
							$mail->AddAddress($usupara);
							$mail->Subject = $asunto;
							$mail->Body = $mensaje;
							//Para adjuntar archivo
							//$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
							$mail->MsgHTML($mensaje);

							//Avisar si fue enviado o no y dirigir al index
							if($mail->Send())
							{
								echo'<script type="text/javascript">
										window.location.href
									 </script>';
							}
							
}
?>