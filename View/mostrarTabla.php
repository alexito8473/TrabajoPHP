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
            <h1>Mostrar tabla</h1>
        </div>
    </header>
    <div class="separador">
        <div class="container">
            <main>
                <section class="anadir">
                    <form method="post" action="logicaOferta.php"><input type="submit" value="Añadir una nueva fila"></form>
                </section>
                <section class="tabla">
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
                            try {
                                $resultado = $database->select(
                                    "ofertaeducativa",
                                    "*"
                                );
                                mostrarTablaOferta($resultado,"ofertaeducativa");
                            } catch (Exception) {
                                echo "<br><h2><b>NO PUDO CONECTARSE</b></h2>";
                            }         
                     ?>
                </section>
            </main>
            <footer>
                <p>Hecho por Alejandro Aguilar y Cristian Gil</p>
            </footer>
        </div>
    </div>
</body>

</html>