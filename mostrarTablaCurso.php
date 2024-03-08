<?php
session_start();
if(isset($_SESSION["inicioSesion"])){
    if(!$_SESSION["inicioSesion"]){
        header("Location: index.php?mensaje=Debes iniciar sesión");
    }
}else{
    header("Location: index.php?mensaje=Debes iniciar sesión");
}
 require "metodo.php";
 require('Medoo.php');
 use Medoo\Medoo;
 $database = new Medoo([
             'database_type' => 'mysql',
             'database_name' => 'horario',
             'server' => 'localhost:3307',
             'username' => 'root',
             'password' => ''
             ]);
$resultado = $database->select("curso","*");
if(count($resultado) == 0){
    header("Location: error.php?tipoError=No hay registros, introduce alguno&destino=insertCurso.html");
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleMostratTabla.css">
    <title>Tabla profesor</title>
</head>
<body>
    <header>
        <div>
            <h1>Mostrar tabla curso</h1>
        </div>
    </header>
    <div class="separador">
        <div class="container">
            <main>
                <section class="anadir">
                    <form method="post" action="logicaOferta.php"><input type="submit" value="Añadir nuevo registro"></form>
                    <form method="post" action="principal.php"><input type="submit" value="Menu principal"></form>
                </section>
                <section class="tabla">
                    <?php
                            try {
                                mostrarTablaCurso($resultado);
                            } catch (Exception) {
                                echo "<br><h2><b>Fallo en la conexion con la base de datos</b></h2>";
                            }         
                     ?>
                </section>
                <section class="Mostrar">
                    <div>
                    <?php
                        if(!empty($_GET) && isset($_GET)){
                            if (!empty($_GET["editar"]) && isset($_GET["editar"])) {
                                $resultado = $database->select(
                                    "curso",
                                    "*",
                                    ["codOe[=]" => $_GET["cod1"],
                                    "fechaActa[=]" => $_GET["cod2"],
                                    "codCurso[=]" => $_GET["cod3"]]
                                );
                                $contadorProfesor = $database->select("profesor","*");
                                    echo "<form action=\"logicaEditarBorrarCurso.php\" method=\"post\">
                                    <input type=\"text\"  hidden=true value=\"".$resultado[0]["codOe"]."\" name=\"cod1\">
                                    <input type=\"text\"  hidden=true value=\"".$resultado[0]["fechaActa"]."\" name=\"cod2\">
                                    <input type=\"text\"  hidden=true value=\"".$resultado[0]["codCurso"]."\" name=\"cod3\">
                                    <div>
                                        <p>Tutor</p>
                                        <select name=\"cod4\" size=\"1\">";
                                    for($i=0;$i<count($contadorProfesor);$i++){
                                        echo "<option value=\"".$contadorProfesor[$i]["codProf"]."\">".$contadorProfesor[$i]["codProf"]."</option>";
                                    }   
                                        echo "</select>
                                    </div>
                                  
                                    <div><input class=\"actu\" type=\"submit\" name=\"actualizar\" value=\"Actualizar\"></div>

                                    </form>";
                            } else if(!empty($_GET["borrar"]) && isset($_GET["borrar"])){

                            }else{
                                if(!empty($_GET["mensaje"]) && isset($_GET["mensaje"])){
                                    echo "<div class=\"frase\">";
                                    echo "<p>";
                                    echo $_GET["mensaje"];
                                    echo "</p>";
                                    echo "</div>";
                                }
                            }
                        }
                     ?>
                     </div>
                </section>
            </main>

        </div>
        <footer>
                <p>Hecho por Alejandro Aguilar y Cristian Gil</p>
    </footer>
    </div>
    <div>
    </div>
</body>
</html>