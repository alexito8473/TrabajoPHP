<?php
use Medoo\Medoo;
require('Medoo.php');
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'horario',
    'server' => 'localhost:3307',
    'username' => 'root',
    'password' => ''
    ]);

if (!empty($_POST) && isset($_POST)) {
    if(!empty($_POST["actualizar"]) && isset($_POST["actualizar"])){
        $database->update("asignatura", 
        ["nombre" => $_POST["cod2"],
        "horasSemanales" => $_POST["cod3"],
        "horasTotales" => $_POST["cod4"]
        ], 
        ["codAsig[=]" => $_POST["cod1"]
        ]);
        header('Location: mostrarTablaAsignatura.php?mensaje=Actualizado con exito');
    }else{
        if (!empty($_POST["si"]) && isset($_POST["si"])) {
            $resultado=$database->delete("asignatura",["codAsig[=]" => $_POST["cod1"]]);
            header("Location: mostrarTablaAsignatura.php");
        }else if(!empty($_POST["no"]) && isset($_POST["no"])){
            header("Location: mostrarTablaAsignatura.php");
        }
    }
}
    header("Location: index.php");
?>