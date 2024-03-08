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
        $database->update("profesor", 
        ["nombre" => $_POST["cod2"],
        "apellidos" => $_POST["cod3"],
        "fechaAlta" => $_POST["cod4"]
        ], 
        ["codProf[=]" => $_POST["cod1"]
        ]);
        header('Location: mostrarTablaProfesor.php?mensaje=Actualizado con exito');
    }else{
        if (!empty($_POST["si"]) && isset($_POST["si"])) {
            $controlarProfesor = $database->select('curso',"*", ["codTutor[=]" => $_POST["cod1"]]);
            if(count($controlarProfesor)==0){
                $database->delete("profesor",["codProf[=]" => $_POST["cod1"]]);
                header('Location: mostrarTablaProfesor.php?mensaje=Borrado con exito');
            }else{
                header('Location: mostrarTablaProfesor.php?mensaje=Es un tutor');
            }
        }else{
            header('Location: mostrarTablaProfesor.php');
        }
    }
}
?>