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
        $controlador=false;
        $mensaje="";
        $codCursoOfeExists = $database->select('curso',"*", [
            "codOe[=]" => $_POST["cod1"],
            "fechaActa[=]" => $_POST["cod2"],
            "codCurso[=]" => $_POST["cod3"]
        ]);
        if (count($codCursoOfeExists)==0) {
            $mensaje=$mensaje." No hay datos en la tabla curso que coinciden";
            $controlador=true;
        }
        
        $codAsigExists = $database->select('asignatura',"*", ["codAsig[=]" => $_POST["cod4"]]);
        
        if (count($codAsigExists)==0) {
            $mensaje=$mensaje." No existe esa asignatura en la base de datos de asignaturas";
            $controlador=true;
        }
        
        $codTramoExists = $database->has('tramoHorario', [
            "codTramo" => $_POST["cod5"]
        ]);
        
        if (!$codTramoExists) {
            $mensaje=$mensaje." No existe ese tramo en la base de datos";
            $controlador=true;
        }
        
        if($controlador){
            header('Location: error.php?tipoError='.$mensaje.'&destino=mostrarTablaHorario.php');
        }else{
            $resultado = $database->select(
                "horario",
                "*",
                ["codOe[=]" => $_GET["cod1"],
                "fechaActa[=]" => $_GET["cod2"],
                "codCurso[=]" => $_GET["cod3"],
                "codAsig[=]" => $_GET["cod4"],
                "codTramo[=]" => $_GET["cod5"]
                ]
            );
            if(count($resultado)>0){
                header('Location: error.php?tipoError=Ya existe un registro con esos datos&destino=mostrarTablaHorario.php');
            }else{
                $database->update("horario", 
                ["codOe" => $_POST["cod1"],
                "fechaActa" => $_POST["cod2"],
                "codCurso" => $_POST["cod3"],
                "codAsig" => $_POST["cod4"],
                "codTramo" => $_POST["cod5"]
                ], 
                ["codOe[=]" => $_POST["cod6"],
                "fechaActa[=]" => $_POST["cod7"],
                "codCurso[=]" => $_POST["cod8"],
                "codAsig[=]" => $_POST["cod9"],
                "codTramo[=]" => $_POST["cod10"]
                ]);
                header('Location: mostrarTablaHorario.php?mensaje=Actualizado con exito');
            }
        }
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