<?php

include "../connection/connection.php";

class DAO_Imagenes{
	public static function listarImagenes(){
		$query   = "SELECT * FROM imagen LIMIT 0, 5";
		$imagen  = mysql_query($query);
		$results = array();
		while($rs = mysql_fetch_assoc($imagen)){
			array_push($results, $rs);
		}
		return $results;
	}
}