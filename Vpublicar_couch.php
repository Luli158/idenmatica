<?php
	include_once("connection.php");
	$conec=connection();
	session_start();
	$idusuario=$_SESSION['usuario'];
	$fecha=date("Y-m-d");
	$fechaindex=date("Y-m-d H:i:s");
	$titulo=$_POST["titulo"];
	$descripcion=$_POST["descripcion"];
	$ubicacion=$_POST["ubicacion"];
	$canthabitantes=$_POST["habitantes"];
	$cantpersonas=$_POST["capacidad"];
	$despublicado='0';
	$tipo=$_POST["tipo"];
	$deshabilitado='0';
	$imagenincorrecta='0';
	if(isset($_FILES["imagen"]) && $_FILES["imagen"]["name"][0]){
    	for($i=0;$i<count($_FILES["imagen"]["name"]);$i++){
            # si es un formato de imagen
            if($_FILES["imagen"]["type"][$i]!="image/jpeg" AND $_FILES["imagen"]["type"][$i]!="image/pjpeg" AND $_FILES["imagen"]["type"][$i]!="image/gif" AND $_FILES["imagen"]["type"][$i]!="image/png"){
            	$deshabilitado='1';
			}
		}
		if($deshabilitado=='0'){
			$sql= "INSERT INTO couch (fecha, titulo, descripcion, ubicacion, canthabitantes, cantpersonas, despublicado, idusuario, idtipo) VALUES ('$fecha', '$titulo', '$descripcion', '$ubicacion', '$canthabitantes', '$cantpersonas','$despublicado', '$idusuario', '$tipo')";
			mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($conec));
		}
		else{
			$imagenincorrecta='1';
?>
			<script type="text/javascript"> alert ("No se pudo publicar el couch. Verifique el formato de las imagenes."); window.location.href='publicar_couch.php' </script>			
<?php
		}
	}
	else{
		$sql= "INSERT INTO couch (fecha, titulo, descripcion, ubicacion, canthabitantes, cantpersonas, despublicado, idusuario, idtipo) VALUES ('$fecha', '$titulo', '$descripcion', '$ubicacion', '$canthabitantes', '$cantpersonas','$despublicado', '$idusuario', '$tipo')";
		mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($conec));
	}

	/*foreach ($_FILES["imagen"]["error"] as $key => $error) {
		if ($error == UPLOAD_ERR_OK) { //se ha subido bien
			//Cojemos los nombres del fichero
			$nombre_imagen=$_FILES["imagen"]["name"][$key];
			$nombre_temporal=$_FILES["imagen"]["tmp_name"][$key];
			$ruta="./imagenes/$nombre_imagen";
			move_uploaded_file($nombre_temporal, $ruta);
		}//fin del if
		else{
			echo $_FILES["imagen"]["name"][$key]." se subió mal";
		}
	}*/
	if($imagenincorrecta=='0'){
		$idcouch=mysqli_insert_id($conec);//Me trae el último id que se creó en este mismo archivo
		# definimos la carpeta destino
	    $carpeta="imagenes/";
	    # si hay alguna imagen que subir
	    if(isset($_FILES["imagen"]) && $_FILES["imagen"]["name"][0]){
	        # recorremos todos los arhivos que se han subido
	        $carpetaDestino="$carpeta$idcouch";
	        mkdir($carpetaDestino);
	        for($i=0;$i<count($_FILES["imagen"]["name"]);$i++){
	            # si es un formato de imagen
	            if($_FILES["imagen"]["type"][$i]=="image/jpeg" || $_FILES["imagen"]["type"][$i]=="image/pjpeg" || $_FILES["imagen"]["type"][$i]=="image/gif" || $_FILES["imagen"]["type"][$i]=="image/png"){
	                    $nombretemporal=$_FILES["imagen"]["tmp_name"][$i];
	                    $nombreimagen=$_FILES["imagen"]["name"][$i];
	                    $ruta=$carpetaDestino.'/'.$nombreimagen;
	                    # movemos el imagen
	                    if(move_uploaded_file($nombretemporal, $ruta)){
	                        //echo "<br>".$_FILES["imagen"]["name"][$i]." subido correctamente";
	                        $sql= "INSERT INTO imagenescouches (idcouch, rutaimagen) VALUES ('$idcouch', '$ruta')";
							mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($conec));
	                    }
	                    else{

	                        //echo "<br>No se ha podido subir la imagen: ".$_FILES["imagen"]["name"][$i];
?>
							<script type="text/javascript"> alert ("El couch se publico, pero pueden faltar imagenes."); window.location.href='index.php' </script><!--EXPLICAR ESTO EN LA SECCION DE AYUDA-->
<?php
	                    }
	            }
	            else{

	                //echo "<br>".$_FILES["imagen"]["name"][$i]." - NO es imagen jpg";
?>
					<script type="text/javascript"> alert ("Las imagenes deben ser jpeg, pjpeg, gif o png. El couch se publico, pero pueden faltar imagenes."); window.location.href='index.php' </script> <!--EXPLICAR ESTO EN LA SECCION DE AYUDA-->
<?php
	            }
	        }
?>
			<script type="text/javascript"> alert ("Publicacion exitosa"); window.location.href='index.php' </script>
<?php
	    }
	    else{

	        //echo "<br>No se ha subido ninguna imagen";
?>
			<script type="text/javascript"> alert ("El couch se publico correctamente sin imagenes."); window.location.href='index.php' </script>
<?php
	    }
	}
?>
	