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
$resultado = $database->select("tramohorario","*");
if(count($resultado) == 0){
    header("Location: error.php?tipoError=No hay registros, introduce alguno&destino=insertTramo.html");
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
            <h1>Mostrar tabla tramo horario</h1>
        </div>
    </header>
    <div class="separador">
        <div class="container">
            <main>
                <section class="anadir">
                    <form method="post" action="insertTramo.html"><input type="submit" value="Añadir nuevo registro"></form>
                    <form method="post" action="principal.php"><input type="submit" value="Menu principal"></form>
                </section>
                <section class="tabla">
                    <?php
                            try {
                                mostrarTablaTramo($resultado);
                            } catch (Exception) {
                                echo "<br><h2><b>Fallo en la conexion con la base de datos</b></h2>";
                            }         
                     ?>
                </section>
                <section class="Mostrar">
                    <div>
                    <?php
                        if(!empty($_GET) && isset($_GET)){
                            if(!empty($_GET["borrar"]) && isset($_GET["borrar"])){
                                $resultado = $database->select(
                                    "tramohorario",
                                    "*",
                                    ["codTramo[=]" => $_GET["cod1"]]
                                );
                                echo "<div class=\"borrado\">";
                                echo "<p>¿Quieres borrar?</p>";
                                echo "<form action=\"logicaBorrarTramo.php\" method=\"post\">
                                <input type=\"text\" hidden=true value=\"".$resultado[0]["codTramo"]."\" name=\"cod1\">                          
                                <div>
                                <input type=\"submit\" name=\"si\" value=\"Si\">
                                <input type=\"submit\" name=\"no\" value=\"No\">
                                </div>
                                </form>";
                                echo "</div>";
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