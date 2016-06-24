<?php
	session_start();
	$_SESSION['pass'] = $_POST['pass'];
	$_SESSION['nombre'] = $_POST['nombre'];
	$_SESSION['apellido'] = $_POST['apellido'];
	$_SESSION['nacimiento'] = $_POST['nacimiento'];
	$_SESSION['DNI'] = $_POST['DNI'];
	$_SESSION['direccion'] = $_POST['direccion'];

	include_once("connection.php");
	$conec=connection();
	$correo=$_POST["user"];
	$contrasenia=$_POST["pass"];
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$DNI=$_POST["DNI"];
	$direccion=$_POST["direccion"];
	$premium=$_POST["premium"];
	$admin=$_POST["admin"];
	$resul=mysqli_query($conec, "SELECT * FROM usuarios WHERE email='$correo'");
	if(mysqli_num_rows($resul)==0){
		$sql= "INSERT INTO usuarios (email, clave, documento, direccion, apellido, nombre, premium, administrador) VALUES ('$correo', '$contrasenia', '$DNI', '$direccion', '$apellido', '$nombre', '$premium', '$admin')";
		mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($conec));
		session_destroy();
?>
		<script type="text/javascript"> alert ("Registro exitoso"); window.location.href='index.php' </script>
<?php
	}
	else {
		header("Location: ../registro.php?error=1");
	}
?>