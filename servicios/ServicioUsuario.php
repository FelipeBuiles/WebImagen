<?php

session_start();
header('Content-type: text/javascript; charset=utf-8');
header('Access-Control-Allow-Origin: *');
include "../modelo/ControlUsuario.php";

@$nombreServicio = $_GET['nombreServicio'];

switch ($nombreServicio) {
    case 'registro' :
        @$nombre    = $_GET['nombre'];
        @$email     = $_GET['email'];
        @$pass      = $_GET['password'];
        $servicio   = new ServicioUsuario();
        $servicio->registro($nombre, $email, $pass);
        break;

    default :
        break; 
}

class ServicioUsuario {
    private $controlUsuario;

    public function __construct(){
        $this->controlUsuario = new ControlUsuario();
    }

    public function registro($nombre, $email, $pass) {
        echo "success([" . json_encode($this->controlUsuario->registrar($nombre, $email, $pass)) . "])";
    }
}

?>