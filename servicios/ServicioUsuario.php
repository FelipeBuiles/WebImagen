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

    case 'login' :
        @$email     = $_GET['email'];
        @$pass      = $_GET['password'];
        $servicio   = new ServicioUsuario();
        $servicio->login($email, $pass);
        break;

    case 'session' :
        $servicio   = new ServicioUsuario();
        $servicio->getSession();
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
        echo "exito([" . json_encode($this->controlUsuario->registrar($nombre, $email, $pass)) . "])";
    }

    public function login($email, $pass) {
        $result = $this->controlUsuario->consultar($email, $pass);
        if($result) {
            $_SESSION['user'] = $result['id'];
        }
        echo "procesoInicio([" . json_encode($result) . "])";
    }

    public function getSession(){
        if(isset($_SESSION['user'])){
            echo "procesoInicio([".json_decode($_SESSION['user'])."])";
        } else {
            echo "procesoInicio([".json_decode(-1)."])";
        }
    }
}

?>