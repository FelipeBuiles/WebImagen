<?php

	$conexion = mysql_connect("localhost", "root", "") or die("Error de conexion");
    mysql_select_db("webimagen", $conexion) or die("Error base de datos");

?>