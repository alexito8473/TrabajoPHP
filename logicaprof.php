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

if (isset($_REQUEST['cod_prof'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['fecha_nacimiento']) &&
    !empty($_REQUEST['cod_prof']) && !empty($_REQUEST['nombre']) && !empty($_REQUEST['apellido']) && !empty($_REQUEST['fecha_nacimiento'])) {

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost:3307',
        'username' => 'root',
        'password' => ''
    ]);

    $fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
    $cod_prof = $_REQUEST['cod_prof'];
    $profesor_existente = $database->select('profesor', ['codprof'], ['codprof' => $cod_prof]);

    if (!empty($profesor_existente)) {
        header("Location: error.php?tipoError=Error: Profesor ya existente&destino=insertProf.html");
        exit;
    } elseif (strtotime($fecha_nacimiento) > time()) {
        header("Location: error.php?tipoError=Error: La fecha de nacimiento no puede ser futura&destino=insertProf.html");
        exit;
    } else {
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];

        $datos_insertar = [
            'codprof' => $cod_prof,
            'nombre' => $nombre,
            'apellidos' => $apellido,
            'fechaAlta' => date('Y-m-d') // Fecha actual
        ];

        $database->insert('profesor', $datos_insertar);

        header("Location: success.php?mensaje=Datos insertados correctamente&destino=insertProf.html");
        exit;
    }
} else {
    header("Location: error.php?tipoError=Todos los campos son requeridos&destino=insertProf.html");
    exit;
}