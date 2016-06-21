<?php
	session_start();
	$_SESSION['pass'] = $_POST['pass'];  /* Para qué estaba todo esto acá?? XD */
	$_SESSION['nombre'] = $_POST['nombre'];
	$_SESSION['apellido'] = $_POST['apellido'];
	$_SESSION['DNI'] = $_POST['DNI'];
	$_SESSION['fechanac'] = $_POST['fechanac'];
	$_SESSION['direccion'] = $_POST['direccion'];

	include_once("connection.php");
	$conec=connection();
	$correo=$_POST["user"];
	$contrasenia=$_POST["pass"];
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$DNI=$_POST["DNI"];
	$nacimiento=$_POST["fechanac"];
	$direccion=$_POST["direccion"];
	$premium=$_POST["premium"];
	$fechap=$_POST["fechap"];
	$costop=$_POST["costop"];
	$admin=$_POST["admin"];
	$idusuario=$_SESSION['usuario'];
	$resul=mysqli_query($conec, "SELECT email FROM usuarios WHERE idusuario='$idusuario'");
	$resultado=mysqli_query($conec, "SELECT email FROM usuarios WHERE email='$correo'");
	$usuario=mysqli_fetch_array($resul);
	if(mysqli_num_rows($resultado)==0 || $usuario['email']==$correo){ /*la primera condicion verifica que no exista un mail igual ya registrado; la segunda que el mail registrado hasta ahora sea igual que el que está ingresando nuevo*/
		$sql= "UPDATE usuarios SET clave='$contrasenia', documento='$DNI', direccion='$direccion', apellido='$apellido', nombre='$nombre', fechanac='$nacimiento', premium='$premium', fechap='$fechap', costop='$costop', administrador='$admin' WHERE idusuario=$idusuario";
		mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($conec));
		session_destroy();
?>
		<script type="text/javascript"> alert ("Cambio su clave correctamente"); window.location.href='modificar_perfil.php' </script>
<?php
	}
	else {
?>
		<script type="text/javascript"> alert ("Se produjo un error al cambiar la clave"); window.location.href='modificar_perfil.php' </script>
<?php
	}
?>