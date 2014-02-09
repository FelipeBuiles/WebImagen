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

	default:
		break;
}

class ServicioImagenes {
	private $ControlImagenes;

	public function __construct(){
		$this->controlImagenes = new ControlImagenes();
	}

	public function listarImagenes(){
		echo "cargarImagenes([".json_encode($this->controlImagenes->listar())."]);";
	}
}