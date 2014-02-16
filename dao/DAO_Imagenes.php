<?php

include "../connection/connection.php";

class DAO_Imagenes{
	
	public static function listarImagenes(){
		$query   = "SELECT * FROM imagen LIMIT 0, 10";
		$imagen  = mysql_query($query);
		$results = array();
		while($rs = mysql_fetch_assoc($imagen)){
			array_push($results, $rs);
		}
		return $results;
	}

	public static function subirImagenes($src, $descripcion){
		$query 	= "INSERT INTO `imagen` (`id`, `src`, `comments`) VALUES (NULL, '$src', '$descripcion')";
        $result = mysql_query($query);
		return true;
	}

	public static function buscarImagenes($criterio){
		$query  = "SELECT `src` From `imagen` WHERE `comments` LIKE '%".$criterio."%' OR `src` LIKE '%".$criterio."%'";
		$imagen  = mysql_query($query);
		$results = array();
		while($rs = mysql_fetch_assoc($imagen)){
			array_push($results, $rs);
		}
		return $results;
	}
}