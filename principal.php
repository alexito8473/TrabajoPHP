<?php
session_start();
if(isset($_SESSION["inicioSesion"])){
    if(!$_SESSION["inicioSesion"]){
        header("Location: index.php?mensaje=Debes iniciar sesión");
    }
}else{
    header("Location: index.php?mensaje=Debes iniciar sesión");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylePrincipal.css">
    <title>Proyecto 007</title>
</head>

<body>
    <header>
        <div>
            <h1>Panel de control</h1>
            <form action="logicaDestruir.php" method="post">
                <input class="borrar" type="submit" value="Cerrar sesión">
            </form>
        </div>
    </header>
    <div class="separador">
        <div class="container">
            <main>
                <section class="seccion">
                    <div><img src="Utilidad/educacion.png"></div>
                    <h2>Oferta educativa</h2>
                    <p>Una oferta educativa es el conjunto de programas, cursos y oportunidades de aprendizaje que una
                        institución educativa ofrece a sus estudiantes. Va más allá de simples materias, abarcando desde
                        educación formal hasta formación profesional y educación continua. </p>
                    <div class="form1">
                        <form action="mostrarTablaOferta.php" method="get"><input class="saltar" type="submit"
                                name="verOferta" value="Ver"></form>
                    </div>
                    <div class="form2">
                        <form action="InsertOfertaEducativa.html" method="get"><input class="saltar" type="submit"
                                name="añadirOferta" value="Añadir"></form>
                    </div>
                </section>
                <section class="seccion">
                    <div><img src="Utilidad/curso.png"></div>
                    <h2>Curso</h2>
                    <p>Un curso es una unidad específica dentro de la oferta educativa, diseñada para enseñar un tema
                        particular en un período determinado. Puede ser parte de un programa más amplio o impartirse de
                        manera independiente. Los cursos están estructurados para proporcionar un enfoque coherente y
                        sistemático de aprendizaje sobre un tema específico</p>
                        <div class="form1">
                        <form action="mostrarTablaCurso.php" method="get"><input class="saltar" type="submit"
                                name="verOferta" value="Ver"></form>
                    </div>
                    <div class="form2">
                        <form action="insertCurso.php" method="get"><input class="saltar" type="submit"
                                                                           name="añadirOferta" value="Añadir"></form>
                    </div>
                </section>
                <section class="seccion">
                    <div><img src="Utilidad/profesor.png"></div>
                    <h2>Profesor</h2>
                    <p>Un profesor es un guía, un facilitador y un modelo a seguir en el proceso educativo. Más allá de transmitir conocimientos, un buen profesor inspira, motiva y desafía a sus estudiantes a alcanzar su máximo potencial.</p>
                    <div class="form1">
                        <form action="mostrarTablaProfesor.php" method="get"><input class="saltar" type="submit"
                                name="verOferta" value="Ver"></form>
                    </div>
                    <div class="form2">
                        <form action="insertProf.html" method="get"><input class="saltar" type="submit"
                                name="añadirOferta" value="Añadir"></form>
                    </div>
                </section>
                <section class="seccion">
                    <div><img src="Utilidad/asignatura.png"></div>
                    <h2>Asignatura</h2>
                    <p>Una asignatura es una unidad específica de estudio dentro de un plan de estudios, diseñada para abordar un área temática particular. Cada asignatura tiene objetivos de aprendizaje definidos y está estructurada para desarrollar competencias y habilidades específicas en los estudiantes. </p>
                    <div class="form1">
                        <form action="mostrarTablaAsignatura.php" method="get"><input class="saltar" type="submit"
                                name="verOferta" value="Ver"></form>
                    </div>
                    <div class="form2">
                        <form action="insertAsig.html" method="get"><input class="saltar" type="submit"
                                name="añadirOferta" value="Añadir"></form>
                    </div>
                </section>
                <section class="seccion">
                    <div><img src="Utilidad/horario.png"></div>
                    <h2>Horario</h2>
                    <p>Los horarios educativos son como mapas que guían el día a día de estudiantes y profesores en su jornada de aprendizaje. Estos horarios asignan bloques de tiempo para actividades académicas, desde clases y conferencias hasta periodos de estudio independiente y descansos.</p>
                    <div class="form1">
                        <form action="mostrarTablaHorario.php" method="get"><input class="saltar" type="submit"
                                name="verOferta" value="Ver"></form>
                    </div>
                    <div class="form2">
                        <form action="insertHorario.php" method="get"><input class="saltar" type="submit"
                                                                             name="añadirOferta" value="Añadir"></form>
                    </div>
                </section>
                <section class="seccion">
                    <div><img src="Utilidad/escuela.png"></div>
                    <h2>Tramo horario</h2>
                    <p>
Los tramos horarios son segmentos de tiempo específicos que se utilizan para organizar actividades, eventos o servicios según su duración, importancia o conveniencia.</p>
                    <div class="form1">
                        <form action="mostrarTablaTramo.php" method="get"><input class="saltar" type="submit"
                                name="verOferta" value="Ver"></form>
                    </div>
                    <div class="form2">
                        <form action="insertTramo.html" method="get"><input class="saltar" type="submit"
                                name="añadirOferta" value="Añadir"></form>
                    </div>
                </section>
            </main>
            <footer>
                <p>Hecho por Alejandro Aguilar y Cristian Gil</p>
            </footer>
        </div>
    </div>
</body>

</html>