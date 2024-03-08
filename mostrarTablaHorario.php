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
$resultado = $database->select("horario","*");
if(count($resultado) == 0){
    header("Location: error.php?tipoError=No hay registros, introduce alguno&destino=insertHorario.html");
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
            <h1>Mostrar tabla horario</h1>
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
                                $resultado = $database->select(
                                    "horario",
                                    "*"
                                );
                                mostrarTablaHorario($resultado);
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
                                    "horario",
                                    "*",
                                    ["codOe[=]" => $_GET["cod1"],
                                    "fechaActa[=]" => $_GET["cod2"],
                                    "codCurso[=]" => $_GET["cod3"],
                                    "codAsig[=]" => $_GET["cod4"],
                                    "codTramo[=]" => $_GET["cod5"]
                                    ]
                                );
                                    echo "<form action=\"logicaEditarBorrarHorario.php\" method=\"post\">
                                    <div>
                                    <p>Codigo oferta</p><input type=\"text\" value=\"".$resultado[0]["codOe"]."\" name=\"cod1\" required>
                                    </div>
                                    <div>
                                        <p>Fecha Acta</p><input type=\"text\" value=\"".$resultado[0]["fechaActa"]."\" name=\"cod2\" required>
                                    </div>
                                    <div>
                                        <p>Código curso</p><input type=\"text\" value=\"".$resultado[0]["codCurso"]."\" name=\"cod3\" required>
                                    </div>
                                    <div>
                                    <p>Código de asignatura</p><input type=\"text\" value=\"".$resultado[0]["codAsig"]."\" name=\"cod4\"  required>
                                    </div>
                                    <div>
                                    <p>Código del tramo</p><input type=\"text\" value=\"".$resultado[0]["codTramo"]."\" name=\"cod5\"  required>
                                    </div>
                                    <input hidden=true type=\"text\" value=\"".$resultado[0]["codOe"]."\" name=\"cod6\" >
                                    <input hidden=true type=\"text\" value=\"".$resultado[0]["fechaActa"]."\" name=\"cod7\" >
                                    <input hidden=true type=\"text\" value=\"".$resultado[0]["codCurso"]."\" name=\"cod8\" >
                                    <input hidden=true type=\"text\" value=\"".$resultado[0]["codAsig"]."\" name=\"cod9\"  >
                                    <input hidden=true type=\"text\" value=\"".$resultado[0]["codTramo"]."\" name=\"cod10\"  >
                                    <div><input class=\"actu\" type=\"submit\" name=\"actualizar\" value=\"Actualizar\"></div>
                                    </form>";
                            } else if(!empty($_GET["borrar"]) && isset($_GET["borrar"])){
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
                                echo "<div class=\"borrado\">";
                                echo "<p>¿Quieres borrar?</p>";
                                echo "<form action=\"logicaEditarBorrarHorario.php\" method=\"post\">
                                <input type=\"text\" hidden=true value=\"".$resultado[0]["codOe"]."\" name=\"cod1\">
                                <input type=\"text\" hidden=true value=\"".$resultado[0]["fechaActa"]."\" name=\"cod2\" >
                                <input type=\"text\" hidden=true value=\"".$resultado[0]["codCurso"]."\" name=\"cod3\">
                                <input type=\"text\" hidden=true value=\"".$resultado[0]["codAsig"]."\"  name=\"cod4\">
                                <input type=\"text\" hidden=true value=\"".$resultado[0]["codTramo"]."\"  name=\"cod5\">
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