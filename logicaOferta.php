<?php
require 'Medoo.php';
use Medoo\Medoo;

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'horario',
    'server' => 'localhost:3307',
    'username' => 'root',
    'password' => ''
]);

if (!isset($_POST['codOE'], $_POST['nombre'], $_POST['descripcion'], $_POST['grado']) ||
    empty($_POST['codOE']) || empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['grado'])) {

    header("Location: error.php?tipoError=Todos los campos son requeridos&destino=insertofertaEducativa.html");

    exit;
}

$codOE = $_POST['codOE'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$grado = $_POST['grado'];
if ($database->has('ofertaeducativa', ['codOE' => $codOE])) {
    header("Location: error.php?tipoError=Error clave duplicada&destino=InsertOfertaEducativa.html");
    exit;
}

$id = $database->insert('ofertaeducativa', [
    'codOE' => $codOE,
    'nombre' => $nombre,
    'descripcion' => $descripcion,
    'tipo' => $grado
]);

if ($id) {
    header("Location: success.php?mensaje=Se ha insertado correctamente la oferta educativa&destino=insertofertaEducativa.html");
    exit;
} else {
    header("Location: error.php?tipoError=Error: " . $database->error()[2] . "&destino=insertofertaEducativa.html");
    exit;
}