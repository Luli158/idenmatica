<?php
function getCouches() 
{
	include_once ("connection.php");
	$con=connection();
	$couch=array();
	
	if ((isset($_POST['texto'])) || (isset($_POST['tipo'])) || (isset($_POST['fechad'])) || (isset($_POST['fechah'])) || (isset($_POST['cantpersonas'])))
		{
			$texto=$_POST['texto'];
			$tipo=$_POST['tipo'];
			$cant=$_POST['cantpersonas'];
			$fechad=$_POST['fechad'];
			$fechah=$_POST['fechah'];
		
			if (($texto =="") && ($tipo != "null") && ($fechad !="") && ($fechah !="") && ($cant !="")) 
			{
		//	echo "todo menos texto";

			$sql =	"SELECT * FROM couch c 
				INNER JOIN tipos t
                ON c.idtipo = t.idtipo
                WHERE t.idtipo = $tipo AND c.despublicado = 0 AND c.cantpersonas >= $cant AND c.idcouch NOT IN 
				(SELECT s.idcouch FROM solicitudes s WHERE s.estado = 'aceptada' 
				AND (s.fechadesde BETWEEN '$fechad' AND '$fechah' OR s.fechahasta BETWEEN '$fechad' AND '$fechah'
				OR '$fechad' BETWEEN s.fechadesde AND s.fechahasta OR '$fechah' BETWEEN s.fechadesde AND s.fechahasta))";
				
			}	
			
			else if (($texto !="") && ($tipo == "null") && ($fechad !="") && ($fechah !="") && ($cant !=""))
			{
				//	echo "todo menos tipo";
			$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t 
                ON c.idtipo = t.idtipo 
                WHERE (c.titulo LIKE '%$texto%' OR c.descripcion LIKE '%$texto%' 
				OR c.ubicacion LIKE '%$texto%') AND c.despublicado = 0 AND c.cantpersonas >= $cant AND c.idcouch NOT IN 
				(SELECT s.idcouch FROM solicitudes s WHERE s.estado = 'aceptada' 
				AND (s.fechadesde BETWEEN '$fechad' AND '$fechah' OR s.fechahasta BETWEEN '$fechad' AND '$fechah'
				OR '$fechad' BETWEEN s.fechadesde AND s.fechahasta OR '$fechah' BETWEEN s.fechadesde AND s.fechahasta))";

				
			}
			
			else if (($texto !="") && ($tipo != "null") && ($fechad =="") && ($fechah =="") && ($cant !=""))
			{
					//	echo "todo menos fecha";
			$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t 
                ON c.idtipo = t.idtipo
                WHERE  t.idtipo = '$tipo' AND c.cantpersonas >= $cant AND c.despublicado = 0 AND (c.titulo LIKE '%$texto%' OR c.descripcion LIKE '%$texto%' 
				OR c.ubicacion LIKE '%$texto%')";
				
			}
			
			else if (($texto !="") && ($tipo != "null") && ($fechad !="") && ($fechah !="") && ($cant ==""))
			{
			//echo "todo menos cant";
			$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t ON c.idtipo = t.idtipo WHERE c.despublicado = 0 AND  t.idtipo = '$tipo' AND (c.titulo LIKE '%$texto%' OR c.descripcion LIKE '%$texto%' 
				OR c.ubicacion LIKE '%$texto%') AND c.idcouch NOT IN 
			(SELECT s.idcouch FROM solicitudes s WHERE s.estado = 'aceptada' 
				AND (s.fechadesde BETWEEN '$fechad' AND '$fechah' OR s.fechahasta BETWEEN '$fechad' AND '$fechah'
				OR '$fechad' BETWEEN s.fechadesde AND s.fechahasta OR '$fechah' BETWEEN s.fechadesde AND s.fechahasta))";
			}
			
			else if (($texto =="") && ($tipo == "null") && ($fechad !="") && ($fechah !="") && ($cant ==""))
			{
					//	echo "fecha";
			$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t 
                ON c.idtipo = t.idtipo
                WHERE c.despublicado = 0 AND c.idcouch NOT IN 
			(SELECT s.idcouch FROM solicitudes s WHERE s.estado = 'aceptada' 
				AND (s.fechadesde BETWEEN '$fechad' AND '$fechah' OR s.fechahasta BETWEEN '$fechad' AND '$fechah'
				OR '$fechad' BETWEEN s.fechadesde AND s.fechahasta OR '$fechah' BETWEEN s.fechadesde AND s.fechahasta))";
				
			}
			
			else if (($texto !="") && ($tipo == "null") && ($fechad =="") && ($fechah =="") && ($cant ==""))
			{
			//echo "texto";
				$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t ON c.idtipo = t.idtipo WHERE c.despublicado = 0 AND (c.titulo LIKE '%$texto%' OR c.descripcion LIKE '%$texto%' 
				OR c.ubicacion LIKE '%$texto%') ";

			}
			
			else if (($texto =="") && ($tipo != "null") && ($fechad =="") && ($fechah =="") && ($cant ==""))
			{
					//	echo "tipo";
				$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t ON c.idtipo = t.idtipo WHERE t.idtipo = '$tipo' AND c.despublicado = 0";
			}

			else if (($texto =="") && ($tipo == "null") && ($fechad =="") && ($fechah =="") && ($cant !=""))
			{
			//echo "cant";
			$sql = "SELECT * FROM couch c INNER JOIN tipos t ON c.idtipo = t.idtipo WHERE c.despublicado = 0 AND c.cantpersonas >= $cant";
			}
			
			else if (($texto !="") && ($tipo != "null") && ($fechad =="") && ($fechah =="") && ($cant ==""))
			{
			//echo "texto y tipo";
			$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t ON c.idtipo = t.idtipo WHERE c.despublicado = 0 AND  t.idtipo = '$tipo' AND (c.titulo LIKE '%$texto%' OR c.descripcion LIKE '%$texto%' 
				OR c.ubicacion LIKE '%$texto%') ";
			
			}
			
			else if (($texto !="") && ($tipo == "null") && ($fechad !="") && ($fechah !="") && ($cant ==""))
			{
			//echo "texto y fecha";
			$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t ON c.idtipo = t.idtipo WHERE c.despublicado = 0 AND (c.titulo LIKE '%$texto%' OR c.descripcion LIKE '%$texto%' 
				OR c.ubicacion LIKE '%$texto%') AND c.idcouch NOT IN 
			(SELECT s.idcouch FROM solicitudes s WHERE s.estado = 'aceptada' 
				AND (s.fechadesde BETWEEN '$fechad' AND '$fechah' OR s.fechahasta BETWEEN '$fechad' AND '$fechah'
				OR '$fechad' BETWEEN s.fechadesde AND s.fechahasta OR '$fechah' BETWEEN s.fechadesde AND s.fechahasta))";
			}
			
			else if (($texto !="") && ($tipo == "null") && ($fechad =="") && ($fechah =="") && ($cant !=""))
			{
			//echo "texto y cant";
			$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t ON c.idtipo = t.idtipo WHERE c.despublicado = 0 AND c.cantpersonas >= $cant AND (c.titulo LIKE '%$texto%' OR c.descripcion LIKE '%$texto%' 
				OR c.ubicacion LIKE '%$texto%') ";
			}			
			
			else if (($texto !="") && ($tipo != "null") && ($fechad !="") && ($fechah !="") && ($cant !=""))
			{
			//echo "texto, tipo, fecha y cant";
			$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t ON c.idtipo = t.idtipo WHERE c.despublicado = 0 AND c.cantpersonas >= $cant AND  t.idtipo = '$tipo' AND (c.titulo LIKE '%$texto%' OR c.descripcion LIKE '%$texto%' 
				OR c.ubicacion LIKE '%$texto%') AND c.idcouch NOT IN 
			(SELECT s.idcouch FROM solicitudes s WHERE s.estado = 'aceptada' 
				AND (s.fechadesde BETWEEN '$fechad' AND '$fechah' OR s.fechahasta BETWEEN '$fechad' AND '$fechah'
				OR '$fechad' BETWEEN s.fechadesde AND s.fechahasta OR '$fechah' BETWEEN s.fechadesde AND s.fechahasta))";
			}
			
			else if (($texto =="") && ($tipo != "null") && ($fechad !="") && ($fechah !="") && ($cant ==""))
			{
			//echo "tipo y fecha";
				$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t ON c.idtipo = t.idtipo WHERE t.idtipo = '$tipo' AND c.despublicado = 0 AND c.idcouch NOT IN 
			(SELECT s.idcouch FROM solicitudes s WHERE s.estado = 'aceptada' 
				AND (s.fechadesde BETWEEN '$fechad' AND '$fechah' OR s.fechahasta BETWEEN '$fechad' AND '$fechah'
				OR '$fechad' BETWEEN s.fechadesde AND s.fechahasta OR '$fechah' BETWEEN s.fechadesde AND s.fechahasta))";
			}
			
			else if (($texto =="") && ($tipo != "null") && ($fechad =="") && ($fechah =="") && ($cant !=""))
			{
			// echo "tipo y cant";
			$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t ON c.idtipo = t.idtipo WHERE t.idtipo = '$tipo' AND c.despublicado = 0 AND c.cantpersonas >= $cant";
			}

			
			else if (($texto =="") && ($tipo == "null") && ($fechad !="") && ($fechah !="") && ($cant !=""))
			{
			// echo "fecha y cant";
				$sql ="SELECT * FROM couch c 
				INNER JOIN tipos t ON c.idtipo = t.idtipo WHERE c.despublicado = 0 AND c.cantpersonas >= $cant AND c.idcouch NOT IN 
			(SELECT s.idcouch FROM solicitudes s WHERE s.estado = 'aceptada' 
				AND (s.fechadesde BETWEEN '$fechad' AND '$fechah' OR s.fechahasta BETWEEN '$fechad' AND '$fechah'
				OR '$fechad' BETWEEN s.fechadesde AND s.fechahasta OR '$fechah' BETWEEN s.fechadesde AND s.fechahasta))";
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