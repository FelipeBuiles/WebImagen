<?php

include "../dao/DAO_Imagenes.php";
class ControlImagenes{
	public function listar(){
		$result = DAO_Imagenes::listarImagenes();
		return $result;
	}
	public function subir($src, $descripcion){
		return DAO_Imagenes::subirImagenes($src, $descripcion);
	}	
	public function buscar($criterio){
		return DAO_Imagenes::buscarImagenes($criterio);
	}
}