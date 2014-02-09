<?php
include "../connection/connection.php";


class DAO_Usuario {

	public static function buscarUsuario($email, $pass) {
		$query 	= "SELECT * FROM `usuario` WHERE `email`= '".$email."' AND `password` = '".$pass."' ";
		$result = mysql_query($query);
		return mysql_fetch_assoc($result);
	}
	
	public static function crearUsuario($nombre, $email, $pass) {
		/*$query 	= "SELECT * FROM `usuario` WHERE `email`= '".$email."";
		$result	= mysql_query($query);
		if($result) {*/
			$query 	= "INSERT INTO `usuario`(`id`, `nombre`, `email`, `password`) VALUES (NULL,'$nombre','$email','$pass')";
            $result = mysql_query($query);

            return true;
		/*}
		echo "<?$email?>";
		return false;*/
	}
}

?>