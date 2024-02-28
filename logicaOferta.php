<?php
require 'Medoo.php';
use Medoo\Medoo;

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'horario',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);
if (!isset($_POST['codOE'], $_POST['nombre'], $_POST['descripcion'], $_POST['grado']) ||
    empty($_POST['codOE']) || empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['grado'])) {
    header('Location: insertofertaEducativa.html');
    exit;
}

$codOE = $_POST['codOE'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$grado = $_POST['grado'];
if ($database->has('ofertaeducativa', ['codOE' => $codOE])) {
        echo  "Error clave duplicada ";
        echo ' <a href="InsertOfertaEducativa.html">Volver</a>';

    exit;
    }
$id = $database->insert('ofertaeducativa', [
    'codOE' => $codOE,
    'nombre' => $nombre,
    'descripcion' => $descripcion,
    'tipo' => $grado
]);

if ($id) {
    echo "Se ha insertado correctamente";
} else {
    echo "Error: " . $database->error()[2];
}
?>