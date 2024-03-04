<?php
require 'medoo.php';

use Medoo\Medoo;

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'horario',
    'server' => 'localhost:3307',
    'username' => 'root',
    'password' => ''
]);

$codOe = $_POST['codOe'];
$codCurso = $_POST['codCurso'];
$codAsig = $_POST['codAsig'];
$codTramo = $_POST['codTramo'];
$fechaActa = $database->select('curso', 'fechaActa', [
    'codCurso' => $codCurso
])[0];
if(empty($codOe) || empty($codCurso) || empty($codAsig) || empty($codTramo)) {
    header('Location: error.php?tipoError=Campos Vacios&destino=insertHorario.html');
    exit();
}

$codOeExists = $database->has('ofertaEducativa', [
    "codOe" => $codOe
]);

if (!$codOeExists) {
    header('Location: error.php?tipoError=Código OE no existe&destino=insertHorario.html');
    exit();
}

$codCursoExists = $database->has('curso', [
    "codCurso" => $codCurso
]);

if (!$codCursoExists) {
    header('Location: error.php?tipoError=Código Curso no existe&destino=insertHorario.html');
    exit();
}

$codAsigExists = $database->has('asignatura', [
    "codAsig" => $codAsig
]);

if (!$codAsigExists) {
    header('Location: error.php?tipoError=Código Asignatura no existe&destino=insertHorario.html');
    exit();
}

$codTramoExists = $database->has('tramoHorario', [
    "codTramo" => $codTramo
]);

if (!$codTramoExists) {
    header('Location: error.php?tipoError=Código Tramo no existe&destino=insertHorario.html');
    exit();
}


$tramoHorarioExists = $database->has('horario', [
    'codTramo' => $codTramo,
    'codCurso' => $codCurso
]);

if ($tramoHorarioExists) {
    header('Location: error.php?tipoError=Tramo horario ya asignado en el mismo curso&destino=insertHorario.html');
    exit();
}

$database->insert('horario', [
    'codOe' => $codOe,
    'codCurso' => $codCurso,
    'codAsig' => $codAsig,
    'codTramo' => $codTramo,
    'fechaActa' => $fechaActa
]);

header("Location: success.php?mensaje=Horario insertado correctamente&destino=insertHorario.html");
exit();