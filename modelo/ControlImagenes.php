<?php

include "../dao/DAO_Imagenes.php";
class ControlImagenes{
	public function listar(){
		$result = DAO_Imagenes::listarImagenes();
		return $result;
	}
}