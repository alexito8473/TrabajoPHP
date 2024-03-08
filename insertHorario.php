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

$ofertasEducativas = $database->select('ofertaEducativa', '*');
$cursos = $database->select('curso', '*');
$asignaturas = $database->select('asignatura', '*');
$tramos = $database->select('tramoHorario', '*');
if (empty($ofertasEducativas)) {
    header("Location: error.php?tipoError=No existen ofertas educativas.&destino=insertOfertaEducativa.html");
    exit;
}

if (empty($cursos)) {
    header("Location: error.php?tipoError=No existen cursos.&destino=insertCurso.php");
    exit;
}

if (empty($asignaturas)) {
    header("Location: error.php?tipoError=No existen asignaturas.&destino=insertAsig.html");
    exit;
}

if (empty($tramos)) {
    header("Location: error.php?tipoError=No existen tramos.&destino=insertTramo.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styleform.css">
    <meta charset="UTF-8">
    <title>Registro Asignatura</title>
</head>
<body class="container">
<header>
    <div>
        <h1>Registro Horario</h1>
    </div>
</header>
<main>
    <section class="anadir">
        <form method="post" action="logicaHora.php">
            <label for="codOe">Código OE:</label><br>
            <input type="text" id="codOe" name="codOe" maxlength="3" required>
            <br>
            <label for="codCurso">Código del Curso:</label><br>
            <input type="text" id="codCurso" name="codCurso" maxlength="2" required>
            <br>
            <label for="codAsig">Código de Asignatura:</label><br>
            <input type="text" id="codAsig" name="codAsig" maxlength="6" required>
            <br>
            <label for="codTramo">Código de Tramo:</label><br>
            <input type="text" id="codTramo" name="codTramo" maxlength="2" required>
            <br>
            <input type="submit" value="Enviar">

            <input type="button" value=" ir a Principal " class="borrar" onclick="location.href='principal.php'">
            <input type="button" value="Mostrar tabla" class="borrar" onclick="location.href='mostrarTablaHorario.php'">
        </form>
    </section>
</main>
<footer>
    <h3>Hecho por Alejandro Aguilar y Cristian Gil</h3>
</footer>
</body>
</html>