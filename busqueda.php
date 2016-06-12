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
			$sql =	"SELECT * FROM couch c 
				INNER JOIN tipos t
                ON c.idtipo = t.idtipo
                WHERE t.idtipo = $tipo AND c.despublicado = 0 AND c.idcouch NOT IN 
				(SELECT s.idcouch FROM solicitudes s WHERE s.estado = 'aceptada' 
				AND (s.fechadesde BETWEEN '$fechad' AND '$fechah' OR s.fechahasta BETWEEN '$fechad' AND '$fechah'
				OR '$fechad' BETWEEN s.fechadesde AND s.fechahasta OR '$fechah' BETWEEN s.fechadesde AND s.fechahasta))";
				
			}	
			
			else if (($texto !="") && ($tipo == "null") && ($fechad !="") && ($fechah !=""))
			{
						echo "todo menos tipo";
			$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t 
                ON c.idtipo = t.idtipo 
                WHERE (c.cantpersonas >= '$texto' OR c.titulo LIKE '%$texto%' OR c.descripcion LIKE '%$texto%' 
				OR c.ubicacion LIKE '%$texto%') AND c.despublicado = 0 AND c.idcouch NOT IN 
				(SELECT s.idcouch FROM solicitudes s WHERE s.estado = 'aceptada' 
				AND (s.fechadesde BETWEEN '$fechad' AND '$fechah' OR s.fechahasta BETWEEN '$fechad' AND '$fechah'
				OR '$fechad' BETWEEN s.fechadesde AND s.fechahasta OR '$fechah' BETWEEN s.fechadesde AND s.fechahasta))";

				
			}
			
			else if (($texto !="") && ($tipo != "null") && ($fechad =="") && ($fechah ==""))
			{
						echo "todo menos fecha";
			$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t 
                ON c.idtipo = t.idtipo
                WHERE  t.idtipo = '$tipo' AND c.despublicado = 0 AND (c.cantpersonas >= '$texto' OR c.titulo LIKE '%$texto%' OR c.descripcion LIKE '%$texto%' 
				OR c.ubicacion LIKE '%$texto%')";
				
			}
			
			else if (($texto =="") && ($tipo == "null") && ($fechad !="") && ($fechah !=""))
			{
						echo "fecha";
			$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t 
                ON c.idtipo = t.idtipo
                WHERE c.despublicado = 0 AND c.idcouch NOT IN 
			(SELECT s.idcouch FROM solicitudes s WHERE s.estado = 'aceptada' 
				AND (s.fechadesde BETWEEN '$fechad' AND '$fechah' OR s.fechahasta BETWEEN '$fechad' AND '$fechah'
				OR '$fechad' BETWEEN s.fechadesde AND s.fechahasta OR '$fechah' BETWEEN s.fechadesde AND s.fechahasta))";
				
			}
			
			else if (($texto !="") && ($tipo == "null") && ($fechad =="") && ($fechah ==""))
			{
				echo "texto";
				$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t ON c.idtipo = t.idtipo WHERE c.despublicado = 0 AND (c.cantpersonas >= $texto OR c.titulo LIKE '%$texto%' OR c.descripcion LIKE '%$texto%' 
				OR c.ubicacion LIKE '%$texto%') ";

			}
			
			else if (($texto =="") && ($tipo != "null") && ($fechad =="") && ($fechah ==""))
			{
						echo "tipo";
				$sql ="SELECT c.idcouch, c.titulo, c.descripcion, c.ubicacion, c.despublicado, c.idtipo, c.cantpersonas, t.nombre FROM couch c 
				INNER JOIN tipos t ON c.idtipo = t.idtipo WHERE t.idtipo = '$tipo' AND c.despublicado = 0";
			}				
			else 
			{

				$sql = "SELECT * FROM couch c INNER JOIN tipos t ON c.idtipo = t.idtipo WHERE c.despublicado = 0";
					
			}
		}
		
		else 
		{

			$sql = "SELECT * FROM couch c INNER JOIN tipos t ON c.idtipo = t.idtipo WHERE c.despublicado = 0";
				
		}
		
		
		
				return $sql;
		

}
?>