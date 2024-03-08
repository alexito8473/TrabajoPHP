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
        if (!empty($_POST["si"]) && isset($_POST["si"])) {
            $resultado=$database->delete(
                "tramohorario",
                ["codTramo[=]" => $_POST["cod1"],
                ]
            );
            header("Location: mostrarTablaTramo.php");
        }else if(!empty($_POST["no"]) && isset($_POST["no"])){
            header("Location: mostrarTablaTramo.php");
        }else{
            header("Location: index.php");
        }
    }
?>