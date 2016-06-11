<?php
function getCouches() 
{
	include_once ("connection.php");
	$con=connection();
	$couch=array();
	
	if ((isset($_POST['texto'])) || (isset($_POST['tipo'])) || (isset($_POST['fechad'])) || (isset($_POST['fechah'])))
		{
			$texto=$_POST['texto'];
			$tipo=$_POST['tipo'];
			$fechad=$_POST['fechad'];
			$fechah=$_POST['fechah'];
		
			if (($texto =="") && ($tipo != "null") && ($fechad !="") && ($fechah !="")) 
			{
			echo "todo menos texto";
			$sql ="SELECT c.idcouch, c.titulo, c.descripcion, c.ubicacion, c.despublicado, c.idtipo, c.cantpersonas, t.nombre FROM couch c 
				INNER JOIN tipos t INNER JOIN solicitudes s
                ON c.idtipo = t.idtipo AND s.idcouch = c.idcouch
                WHERE t.idtipo = '$tipo' AND c.idcouch NOT IN 
				(SELECT s.idcouch FROM solicitudes s WHERE s.estado = 'aceptada' 
				AND (s.fechadesde BETWEEN '$fechad' AND '$fechah') OR (s.fechahasta BETWEEN '$fechad' AND '$fechah'))";
				
			}	
			
			else if (($texto !="") && ($tipo == "null") && ($fechad !="") && ($fechah !=""))
			{
						echo "todo menos tipo";
			$sql ="SELECT c.idcouch, c.titulo, c.descripcion, c.ubicacion, c.despublicado, c.idtipo, c.cantpersonas, t.nombre FROM couch c 
				INNER JOIN tipos t INNER JOIN solicitudes s
                ON c.idtipo = t.idtipo AND s.idcouch = c.idcouch
                WHERE c.cantpersonas >= '$texto' OR c.titulo LIKE '%$texto%' OR c.descripcion LIKE '%$texto%' 
				OR c.ubicacion LIKE '%$texto%' AND c.idcouch NOT IN 
				(SELECT s.idcouch FROM solicitudes s WHERE s.estado = 'aceptada' 
				AND (s.fechadesde BETWEEN '$fechad' AND '$fechah') OR (s.fechahasta BETWEEN '$fechad' AND '$fechah'))";
				
			}
			
			else if (($texto !="") && ($tipo != "null") && ($fechad =="") && ($fechah ==""))
			{
						echo "todo menos fecha";
			$sql ="SELECT c.idcouch, c.titulo, c.descripcion, c.ubicacion, c.despublicado, c.idtipo, c.cantpersonas, t.nombre FROM couch c 
				INNER JOIN tipos t INNER JOIN solicitudes s
                ON c.idtipo = t.idtipo AND s.idcouch = c.idcouch
                WHERE  t.idtipo = '$tipo' AND c.cantpersonas >= '$texto' OR c.titulo LIKE '%$texto%' OR c.descripcion LIKE '%$texto%' 
				OR c.ubicacion LIKE '%$texto%'";
				
			}
			
			else if (($texto =="") && ($tipo == "null") && ($fechad !="") && ($fechah !=""))
			{
						echo "fecha";
			$sql ="SELECT c.idcouch, c.titulo, c.descripcion, c.ubicacion, c.despublicado, c.idtipo, c.cantpersonas, t.nombre FROM couch c 
				INNER JOIN tipos t INNER JOIN solicitudes s
                ON c.idtipo = t.idtipo AND s.idcouch = c.idcouch
                WHERE c.idcouch NOT IN 
				(SELECT s.idcouch FROM solicitudes s WHERE s.estado = 'aceptada' 
				AND (s.fechadesde BETWEEN '$fechad' AND '$fechah') OR (s.fechahasta BETWEEN '$fechad' AND '$fechah'))";
				
			}
			
			else if (($texto !="") && ($tipo == "null") && ($fechad =="") && ($fechah ==""))
			{
								echo "texto";
				$sql ="SELECT c.idcouch, c.titulo, c.descripcion, c.ubicacion, c.despublicado, c.idtipo, c.cantpersonas, t.nombre FROM couch c 
				INNER JOIN tipos t INNER JOIN solicitudes s
                ON c.idtipo = t.idtipo AND s.idcouch = c.idcouch
                WHERE c.cantpersonas >= '$texto' OR c.titulo LIKE '%$texto%' OR c.descripcion LIKE '%$texto%' 
				OR c.ubicacion LIKE '%$texto%'";

			}
			
			else if (($texto =="") && ($tipo != "null") && ($fechad =="") && ($fechah ==""))
			{
						echo "tipo";
				$sql ="SELECT c.idcouch, c.titulo, c.descripcion, c.ubicacion, c.despublicado, c.idtipo, c.cantpersonas, t.nombre FROM couch c 
				INNER JOIN tipos t INNER JOIN solicitudes s
                ON c.idtipo = t.idtipo AND s.idcouch = c.idcouch
                WHERE t.idtipo = '$tipo'";
			}				
			else 
			{

				$sql = "SELECT * FROM couch c INNER JOIN tipos t ON c.idtipo = t.idtipo";
					
			}
		}
		
		else 
		{

			$sql = "SELECT * FROM couch c INNER JOIN tipos t ON c.idtipo = t.idtipo";
				
		}
		
		if ($resul = mysqli_query ($con, $sql)) 
				{
					return $resul;
				}
}
?>