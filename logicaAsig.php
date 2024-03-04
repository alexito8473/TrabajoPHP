<?php
$codAsig = $_POST['codAsig'];
$nombre = $_POST['nombre'];
$horaSem = $_POST['horaSem'];
$horasTotal = $_POST['horatot'];

if (empty($codAsig) || empty($nombre) || empty($horaSem) || empty($horasTotal)) {
    header("Location: error.php?tipoError=Campos vacíos&destino=insertAsig.html");
    exit;
}
require 'medoo.php';

use Medoo\Medoo;


$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'horario',
    'server' => 'localhost:3307',
    'username' => 'root',
    'password' => ''
]);

$asignatura = $database->get('asignatura', 'codAsig', ['codAsig' => $codAsig]);

if(!$asignatura) {
    $database->insert('asignatura', [
        'codAsig' => $codAsig,
        'nombre' => $nombre,
        'horasSemanales' => $horaSem,
        'horasTotales' => $horasTotal
    ]);
    header("Location: success.php?mensaje=Insercion correcta&destino=insertAsig.html");    exit;

} else {
    header("Location: error.php?tipoError=Error de Inserción&destino=insertAsig.html");
    exit();
}