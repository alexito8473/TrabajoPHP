<?php
require 'Medoo.php';

use Medoo\Medoo;

// Initialize
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
        echo "Error: Todos los campos son requeridos";
        exit;
    }

    $codOe = $_POST['codOe'];
    $codcurso = $_POST['codcurso'];
    $codtutor = $_POST['codtutor'];
    if ($database->has('curso', ['codcurso' => $codcurso])) {
        echo "Error: El curso ya existe en la base de datos";
        echo ' <a href="insertCurso.html">Volver</a>';
    } else if (!$database->has('profesor', ['codprof' => $codtutor])) {
        echo "Error: El tutor no existe en la base de datos";
        echo ' <a href="insertCurso.html">Volver</a>';


    } elseif (!$database->has('ofertaeducativa', ['codOe' => $codOe])) {
        echo "Error: La oferta educativa no existe en la base de datos";
        echo ' <a href="insertCurso.html">Volver</a>';

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
            echo "Se ha insertado correctamente en BD ";
        } else {
            echo "Error: Ese tutor esta duplicado";
        }
    }
}


?>