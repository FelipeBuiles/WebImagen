<?php

header('Content-type: text/javascript; charset=utf-8');
header('Access-Control-Allow-Origin: *');
include "../modelo/ControlImagenes.php";

@$nombreServicio = $_GET['nombreServicio'];

switch ($nombreServicio){
	case 'listar':
		$servicio = new ServicioImagenes();
		$servicio->listarImagenes();
		break;
	case 'subir':
		$src = subir().$url;
		$comments = $_GET['comments'];
		$servicio = new ServicioImagenes();
		$servicio->subirImagen($src, $comments);
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

	public function subirImagen(){
		echo "successImagen([" . json_encode($this->controlImagenes->subir($src, $comments)) . "])";
	}
	
	public function subir(){

		if (file_exists("dirImagenes/" . $_FILES["file"]["name"]))
		{
			echo "(".$_FILES["file"]["name"].")"." already exists. "."</div>";
		}else{

			move_uploaded_file($_FILES["file"]["tmp_name"], "dirImagenes/" . $_FILES["file"]["name"]);
			echo "Stored in: " ."dirImagenes/" . $_FILES["file"]["name"]."";
		}
	}
}