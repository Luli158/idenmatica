<?PHP
	
	if(isset($_GET['error'])){
		$error=$_GET['error'];
		$error=alertar($error);
		try{
			throw new Exception($error);
		}
		catch(Exception $e){
?>
			</br>
<?php
			echo $e->getMessage(),"\n";
		}
	}
?>
<?php
		function alertar($error){
			switch($error){
				case 0:
					return("Acceso denegado.");
				break;
				case 1:
					return("Ese email ya se encuentra registrado.");
				break;
				case 2:
					return("No se pudo modificar. Ese tipo ya existe.");
				break;
				case 4:
					return("");
				break;
				case 6:
					return("");
				break;
				case 9:
					return("");
				break;
				case 13:
					return("");
				break;
				case 16:
					return("");
				break;
				case 17:
					return("");
				break;
				case 18:
					return("");
				break;
			}
		}
?>