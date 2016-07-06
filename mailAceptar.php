<?php 
function enviar ($es, $e)
{
//Librerías para el envío de mail
							include_once('class.phpmailer.php');
							include_once('class.smtp.php');
							//Recibir todos los parámetros del formulario
							$asunto = "Has aceptado una solicitud";
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
							$mail->AddAddress($e);
							$mail->Subject = $asunto;
							$mail->Body = $mensaje;
							//Para adjuntar archivo
							//$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
							$mail->MsgHTML($mensaje);

							//Avisar si fue enviado o no y dirigir al index
						/*	if($mail->Send())
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
							} */
}
?>