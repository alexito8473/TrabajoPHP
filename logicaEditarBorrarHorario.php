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

    }else{
        if (!empty($_POST["si"]) && isset($_POST["si"])) {
      
            $resultado2=$database->delete(
                "horario",
                ["codOe[=]" => $_POST["cod1"],
                "fechaActa[=]" => $_POST["cod2"],
                "codCurso[=]" => $_POST["cod3"],
                "codAsig[=]" => $_POST["cod4"],
                "codTramo[=]" => $_POST["cod5"]
                ]
            );
            header("Location: mostrarTablaHorario.php");
        }else if(!empty($_POST["no"]) && isset($_POST["no"])){
            header("Location: mostrarTablaHorario.php");
        }else{
            header("Location: index.php");
        }
    }
}
?>