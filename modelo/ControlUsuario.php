<?php
include "../dao/DAO_Usuario.php";

class ControlUsuario {

	public function consultar($email, $pass) {
		$result = DAO_Usuario::buscarUsuario($email, $pass);
		return $result;
	}

	public function registrar($nombre, $email, $pass) {
		return DAO_Usuario::crearUsuario($nombre, $email, $pass);
	}
}

?>