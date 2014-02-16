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
		@$src 			= $_GET['src'];
		$src = "../dirImagenes/" . $src;
		@$descripcion 	= $_GET['descripcion'];
		$servicio 		= new ServicioImagenes();
		$servicio->subirImagen($src, $descripcion);
		break;
	case 'buscar':
		@$criterio 	= $_GET['criterio'];
		$servicio 		= new ServicioImagenes();
		$servicio->buscarImagen($criterio);
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

	public function subirImagen($src, $descripcion){
		echo "successImagen([" . json_encode($this->controlImagenes->subir($src, $descripcion)) . "])";
	}

	public function buscarImagen($criterio){
		echo "successBuscar([" . json_encode($this->controlImagenes->buscar($criterio)) . "])";
	}
	//public function subirImagen($src, $descripcion){
		
	//		if (file_exists("dirImagenes/" . $src))
	//		{
	//			echo "Ya existe la imagen";
	//		}else{

	//			move_uploaded_file($src, "dirImagenes/" . $src);
	//			echo "successImagen([" . json_encode($this->controlImagenes->subir($src, $descripcion)) . "])";
	//		}
	//}
}