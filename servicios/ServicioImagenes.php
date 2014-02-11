<?php

header('Content-type: text/javascript; charset=utf-8');
header('Access-Control-Allow-Origin: *');
include "../modelo/ControlImagenes.php";

@$nombreServicio = $_GET['nombreServicio'];

switch ($nombreServicio){
	case 'listar':
		$servicio 	= new ServicioImagenes();
		$servicio->listarImagenes();
		break;
	case 'subir':
		@$src 		= $_FILES["file"]["name"];
		@$comments 	= $_GET['comments'];
		$servicio 	= new ServicioImagenes();
		$servicio->subir($src, $comments);
		break;
	default:
		break;
}

class ServicioImagenes {
	private $ControlImagenes;

	public function __construct(){
		$this->controlImagenes = new ControlImagenes();
	}

	public function listarImagenes(){
		echo "cargarImagenes([" . json_encode($this->controlImagenes->listar())."]);";
	}
/*
	public function subirImagen(){
		echo "successImagen([" . json_encode($this->controlImagenes->subir($src, $comments)) . "])";
	}
*/
	public function subir($src, $comments){
		
		if ($this->controlImagenes->subir($src, $comments)){
			if (file_exists("dirImagenes/" . $src))
			{
				echo "ya existe";
			}else{

				move_uploaded_file($src, "dirImagenes/" . $src);
				echo "successImagen([])";
			}
		} else {
			echo "problemas problemisticos";
		}
	}
}