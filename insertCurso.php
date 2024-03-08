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

if (empty($ofertasEducativas)) {
    header("Location: error.php?tipoError=No existen ofertas educativas.&destino=insertOfertaEducativa.html");
    exit;
}

$profesores = $database->select('profesor', 'codProf');
$tutores = $database->select('curso', 'codTutor');
$profesoresNoTutores = array_filter($profesores, function($profesor) use ($tutores) {
    return !in_array($profesor, $tutores);
});

if (empty($profesoresNoTutores)) {
    header("Location: error.php?tipoError=No existen profesores que no sean tutores.&destino=insertProf.html");
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
        <h1>Registro Curso</h1>
    </div>
</header>
<main>
    <section class="anadir">
        <form action="logicaCurso.php" method="post">
            <label for="codOe">codOe:</label><br>
            <input type="text" id="codOe" name="codOe" pattern="[A-Za-z]{3}" required><br>

            <label for="codcurso">codcurso:</label><br>
            <input type="text" id="codcurso" name="codcurso" pattern="[A-Za-z]{3}" required><br>

            <label for="codtutor">codtutor:</label><br>
            <input type="text" id="codtutor" name="codtutor" pattern="[A-Za-z]{3}" required><br>

            <input type="submit" value="Enviar">

            <input type="button" value=" ir a Principal " class="borrar" onclick="location.href='principal.php'">
            <input type="button" value="Mostrar tabla" class="borrar" onclick="location.href='mostrarTablaCurso.php'">
        </form>
    </section>
</main>
<footer>
    <h3>Hecho por Alejandro Aguilar y Cristian Gil</h3>
</footer>
</body>
</html>