<?php
session_start();
if(isset($_SESSION["inicioSesion"])){
    if(!$_SESSION["inicioSesion"]){
        header("Location: index.php?mensaje=Debes iniciar sesión");
    }
}else{
    header("Location: index.php?mensaje=Debes iniciar sesión");
}
require 'Medoo.php';

use Medoo\Medoo;

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'horario',
    'server' => 'localhost:3307',
    'username' => 'root',
    'password' => ''
]);

$codTramo = $_POST['codTramo'];
$dia = $_POST['dia'];

if(empty($codTramo)  || empty($dia)) {
    header("Location: error.php?tipoError=Todos los campos son requeridos&destino=insertTramo.html");
    exit;
}

switch ($dia) {
    case "LUNES":
        $codTramo = "L" . $codTramo;
        break;
    case "MARTES":
        $codTramo = "M" . $codTramo;
        break;
    case "MIERCOLES":
        $codTramo = "X" . $codTramo;
        break;
    case "JUEVES":
        $codTramo = "J" . $codTramo;
        break;
    case "VIernes":
        $codTramo = "V" . $codTramo;
        break;
}

switch ($codTramo[1]) {
    case "1":
        $horaInicio = "08:15";
        $horaFin = "09:15";
        break;
    case "2":
        $horaInicio = "09:15";
        $horaFin = "10:15";
        break;
    case "3":
        $horaInicio = "10:15";
        $horaFin = "11:15";
        break;
    case "4":
        $horaInicio = "11:45";
        $horaFin = "12:45";
        break;
    case "5":
        $horaInicio = "12:45";
        $horaFin = "13:45";
        break;
    case "6":
        $horaInicio = "13:45";
        $horaFin = "14:45";
        break;
}

if($database->has('tramoHorario', ['codTramo' => $codTramo])) {
    header("Location: error.php?tipoError=Error a la inserción&destino=insertTramo.html");
    exit;
}

$database->insert('tramoHorario', [
    'codTramo' => $codTramo,
    'horaInicio' => $horaInicio,
    'horaFin' => $horaFin,
    'dia' => $dia
]);

header("Location: success.php?mensaje=Inserción correcta&destino=insertTramo.html");
exit;

?>