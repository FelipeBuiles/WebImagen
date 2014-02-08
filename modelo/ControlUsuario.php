<?php

include "../dao/DAO_Usuario.php";

class ControlUsuario {

	public function registrar($nombre, $email, $pass) {
		return DAO_Usuario::crearUsuario($nombre, $email, $pass);
	}
}

?>