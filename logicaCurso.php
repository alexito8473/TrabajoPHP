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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['codOe'], $_POST['codcurso'], $_POST['codtutor']) ||
        empty($_POST['codOe']) || empty($_POST['codcurso']) || empty($_POST['codtutor'])) {
        header("Location: error.php?tipoError=Todos los campos son requeridos&destino=insertCurso.html");
        exit;
    }

    $codOe = $_POST['codOe'];
    $codcurso = $_POST['codcurso'];
    $codtutor = $_POST['codtutor'];
if ($database->count('curso', ['codtutor' => $codtutor]) > 0) {
    header("Location: error.php?tipoError=Este profesor ya es tutor de un curso&destino=insertCurso.html");
    exit;
}
    if ($database->has('curso', ['codcurso' => $codcurso])) {
        header("Location: error.php?tipoError=El curso ya existe en la base de datos&destino=insertCurso.html");
        exit;
    } else if (!$database->has('profesor', ['codprof' => $codtutor])) {
        header("Location: error.php?tipoError=El tutor no existe en la base de datos&destino=insertCurso.html");
        exit;
    } elseif (!$database->has('ofertaeducativa', ['codOe' => $codOe])) {
        header("Location: error.php?tipoError=La oferta educativa no existe en la base de datos&destino=insertCurso.html");
        exit;
    } else {
        $fechaacta = $database->get('ofertaeducativa', 'fechaacta', ['codOe' => $codOe]);
        $codOe1 = $database->get('ofertaeducativa', 'codOe', ['codOe' => $codOe]);
        $id = $database->insert('curso', [
            'codOe' => $codOe,
            'fechaacta' => $fechaacta,
            'codcurso' => $codcurso,
            'codtutor' => $codtutor
        ]);

        if ($id) {
            header("Location: success.php?mensaje=Se ha insertado correctamente en BD&destino=insertCurso.html");
            exit;
        } else {
            header("Location: error.php?tipoError=Error: Ese tutor está duplicado&destino=insertCurso.html");
            exit;
        }
    }
}