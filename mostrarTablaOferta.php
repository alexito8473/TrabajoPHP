<?php
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
                    <form method="post" action="prinicpal.php"><input type="submit" value="Menu principal"></form>
                </section>
                <section class="tabla">
                    <?php
                            try {
                                $resultado = $database->select(
                                    "ofertaeducativa",
                                    "*"
                                );
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
                                $resultado = $database->select(
                                    "ofertaeducativa",
                                    "*",
                                    ["codOe[=]" => $_GET["cod1"],"fechaActa[=]"=>$_GET["cod2"]]
                                );
                                    echo "<form action=\"mostrarTablaOferta.php\" method=\"get\">
                                    <input type=\"text\"  hidden=true value=\"".$resultado[0]["codOe"]."\" name=\"cod1\">
                                    <input hidden=true type=\"text\" value=\"".$resultado[0]["fechaActa"]."\" name=\"cod2\">
                                    <div>
                                        <p>Nombre</p><input type=\"text\" value=\"".$resultado[0]["nombre"]."\" name=\"nombre\">
                                    </div>
                                    <div>
                                        <p>Descripcion</p><input type=\"text\" value=\"".$resultado[0]["descripcion"]."\" name=\"descripcion\">
                                    </div>
                                    <div>
                                    <p>Tipo</p><div>";
                                    if($resultado[0]["tipo"]=="CFGS"){
                                        echo "<div><input checked type=\"radio\" name=\"tipo\" value=\"CFGS\" /><p>CFGS</p></div>
                                        <div><input type=\"radio\" name=\"tipo\" value=\"CFGM\" /><p>CFGM</p></div>
                                    </div>";
                                    }else{
                                        echo "<div><input type=\"radio\" name=\"tipo\" value=\"CFGS\" /><p>CFGS</p></div>
                                        <div><input checked type=\"radio\" name=\"tipo\" value=\"CFGM\" /><p>CFGM</p></div>
                                    </div>";
                                    }
                                    echo"</div><div>
                                        <p>Fecha Ley</p><input type=\"text\" value=\"".$resultado[0]["fechaLey"]."\"  name=\"fechaLey\">
                                    </div>
                                    <div><input class=\"actu\" type=\"submit\" name=\"actualizar\" value=\"Actualizar\"></div>

                                    </form>";
                            } else if(!empty($_GET["borrar"]) && isset($_GET["borrar"])){

                            }else{
                              //  echo $_GET["mesaje"];
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