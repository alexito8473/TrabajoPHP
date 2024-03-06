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
$resultado = $database->select("profesor","*");
if(count($resultado) == 0){
    header("Location: error.php?tipoError=No hay registros, introduce alguno&destino=insertProf.html");
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
            <h1>Mostrar tabla profesor</h1>
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
                                    "profesor",
                                    "*"
                                );
                                mostrarTablaProfesor($resultado);
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
                                    "profesor",
                                    "*",
                                    ["codProf[=]" => $_GET["cod1"]]
                                );
                                    echo "<form action=\"mostrarTablaProfesor.php\" method=\"get\">
                                    <input type=\"text\"  hidden=true value=\"".$resultado[0]["codProf"]."\" name=\"cod1\">
                                    <div>
                                        <p>Nombre</p><input type=\"text\" value=\"".$resultado[0]["nombre"]."\" name=\"nombre\" required>
                                    </div>
                                    <div>
                                        <p>Apellidos</p><input type=\"text\" value=\"".$resultado[0]["apellidos"]."\" name=\"descripcion\" required>
                                    </div>
                                    <div>
                                        <p>Fecha Alta</p><input type=\"date\" value=\"".$resultado[0]["fechaAlta"]."\"  name=\"fechaLey\" required>
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