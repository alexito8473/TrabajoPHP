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
$resultado = $database->select("ofertaeducativa","*");
if(count($resultado) == 0){
    header("Location: error.php?tipoError=No hay registros, introduce alguno&destino=insertofertaEducativa.html");
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleMostratTabla.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div>
            <h1>Mostrar tabla oferta educativa</h1>
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
                            mostrarTablaOferta($resultado);
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
                                $resultado = $database->select("ofertaeducativa","*",["codOe[=]" => $_GET["cod1"],"fechaActa[=]"=>$_GET["cod2"]]);
                                echo "<form action=\"logicaEditarBorrarOferta.php\" method=\"post\">
                                <input type=\"text\" hidden=true value=\"".$resultado[0]["codOe"]."\" name=\"cod1\">
                                <input hidden=true type=\"text\" value=\"".$resultado[0]["fechaActa"]."\" name=\"cod2\">
                                <div>
                                    <p>Nombre</p><input type=\"text\" value=\"".$resultado[0]["nombre"]."\" name=\"cod3\" required>
                                </div>
                                <div>
                                    <p>Descripcion</p><input type=\"text\" value=\"".$resultado[0]["descripcion"]."\" name=\"cod4\" required>
                                </div>
                                <div>
                                <p>Tipo</p><div>";
                                if($resultado[0]["tipo"]=="CFGS"){
                                    echo "<div><input checked type=\"radio\" name=\"cod5\" value=\"CFGS\" /><p>CFGS</p></div>
                                    <div><input type=\"radio\" name=\"cod5\" value=\"CFGM\" /><p>CFGM</p></div>
                                </div>";
                                }else{
                                    echo "<div><input type=\"radio\" name=\"cod5\" value=\"CFGS\" /><p>CFGS</p></div>
                                    <div><input checked type=\"radio\" name=\"cod5\" value=\"CFGM\" /><p>CFGM</p></div>
                                </div>";
                                }
                                echo"</div><div>
                                    <p>Fecha Ley</p><input type=\"text\" value=\"".$resultado[0]["fechaLey"]."\"  name=\"cod6\" required>
                                </div>
                                <div><input class=\"actu\" type=\"submit\" name=\"actualizar\" value=\"Actualizar\"></div>
                                </form>";
                            } else if(!empty($_GET["borrar"]) && isset($_GET["borrar"])){
                                $resultado = $database->select(
                                    "ofertaeducativa",
                                    "*",
                                    ["codOe[=]" => $_GET["cod1"]]
                                );
                                echo "<div class=\"borrado\">";
                                echo "<p>¿Quieres borrar?</p>";
                                echo "<form action=\"logicaEditarBorrarOferta.php\" method=\"post\">
                                <input type=\"text\" hidden=true value=\"".$resultado[0]["codOe"]."\" name=\"cod1\">                          
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