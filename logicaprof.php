<?php
require 'Medoo.php';
use Medoo\Medoo;

if (isset($_REQUEST['cod_prof'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['fecha_nacimiento']) &&
    !empty($_REQUEST['cod_prof']) && !empty($_REQUEST['nombre']) && !empty($_REQUEST['apellido']) && !empty($_REQUEST['fecha_nacimiento'])) {

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $fecha_nacimiento = $_REQUEST['fecha_nacimiento'];

    if (strtotime($fecha_nacimiento) > time()) {
        die('Error: La fecha de nacimiento no puede ser futura.');
    } else {
        $cod_prof = $_REQUEST['cod_prof'];
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];

        $datos_insertar = [
            'codprof' => $cod_prof,
            'nombre' => $nombre,
            'apellidos' => $apellido,
            'fechaAlta' => date('Y-m-d') // Fecha actual
        ];

        $database->insert('profesor', $datos_insertar);

        echo "Datos insertados correctamente.";
    }
} else {
    header("Location: insertProf.html");
    exit;
}
?>