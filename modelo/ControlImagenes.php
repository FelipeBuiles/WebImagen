<?php

include "../dao/DAO_Imagenes.php";
class ControlImagenes{
	public function listar(){
		$result = DAO_Imagenes::listarImagenes();
		return $result;
	}
	public function subir($src, $comments){
		return DAO_Imagenes::subirImagenes($src, $comments);
	}	
}