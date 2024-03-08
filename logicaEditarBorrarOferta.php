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
        $database->update("ofertaeducativa", 
        ["nombre" => $_POST["cod3"],
        "descripcion" => $_POST["cod4"],
        "tipo" => $_POST["cod5"],
        "fechaLey" => $_POST["cod6"]
        ], 
        ["codOe[=]" => $_POST["cod1"],
        "fechaActa[=]" => $_POST["cod2"]
        ]);
        header('Location: mostrarTablaOferta.php?mensaje=Actualizado con exito');
    }else{
        if (!empty($_POST["si"]) && isset($_POST["si"])) {
            $resultado=$database->delete("ofertaeducativa",["codOe[=]" => $_POST["cod1"]]);
            header('Location: mostrarTablaOferta.php?mensaje=Borrado con exito');
        }else if(!empty($_POST["no"]) && isset($_POST["no"])){
            header("Location: mostrarTablaOferta.php");
        }
    }
}
header("Location: mostrarTablaOferta.php");
?>