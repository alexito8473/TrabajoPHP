<?php
function mostrarTablaOferta($resultado){
    echo "<table>";
    echo "<tr>";
    echo "<th>";
    echo "Codigo Oferta";
    echo "</th>";
    echo "<th>";
    echo "Fecha de acta";
    echo "</th>";
    echo "<th>";
    echo "Nombre";
    echo "</th>";
    echo "<th>";
    echo "Descripcion";
    echo "</th>";
    echo "<th>";
    echo "Tipo de curso";
    echo "</th>";
    echo "<th>";
    echo "Fecha Ley";
    echo "</th>";
    echo "<th>";
    echo "Editar";
    echo "</th>";
    echo "<th>";
    echo "Borrar";
    echo "</th>";
    echo "</tr>";
    foreach ($resultado as $key => $row) {
        echo "<tr>";
        echo "<td>";
        echo "<p>";
        echo $row["codOe"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["fechaActa"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["nombre"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["descripcion"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["tipo"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["fechaLey"];
        echo "</p>";
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"mostrarTablaOferta.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codOe"]."\" name=\"cod1\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["fechaActa"]."\" name=\"cod2\">
        <input class=\"editar\" type=\"submit\" name=\"editar\" value=\"Editar\">
        </form>";
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"mostrarTablaOferta.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codOe"]."\" name=\"cod1\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["fechaActa"]."\" name=\"cod2\">
        <input class=\"borrar\" type=\"submit\" name=\"borrar\" value=\"Borrar\">
        </form>";
        echo "</td>";
        echo "</tr>"; 
    }
    echo "</table>";
}

function mostrarTablaProfesor($resultado){
    echo "<table>";
    echo "<tr>";
    echo "<th>";
    echo "Codigo del profesor";
    echo "</th>";
    echo "<th>";
    echo "Nombre del profesor";
    echo "</th>";
    echo "<th>";
    echo "Apellidos";
    echo "</th>";
    echo "<th>";
    echo "fecha de alta";
    echo "</th>";
    echo "<th>";
    echo "Editar";
    echo "</th>";
    echo "<th>";
    echo "Borrar";
    echo "</th>";
    echo "</tr>";
    foreach ($resultado as $key => $row) {
        echo "<tr>";
        echo "<td>";
        echo "<p>";
        echo $row["codProf"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["nombre"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["apellidos"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["fechaAlta"];
        echo "</p>";
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"mostrarTablaProfesor.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codProf"]."\" name=\"cod1\">
        <input class=\"editar\" type=\"submit\" name=\"editar\" value=\"Editar\">
        </form>";
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"mostrarTablaProfesor.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codProf"]."\" name=\"cod1\">
        <input class=\"borrar\" type=\"submit\" name=\"borrar\" value=\"Borrar\">
        </form>";
        echo "</td>";
        echo "</tr>"; 
    }
    echo "</table>";
}
function mostrarTablaAsignatura($resultado){
    echo "<table>";
    echo "<tr>";
    echo "<th>";
    echo "Código asignatura";
    echo "</th>";
    echo "<th>";
    echo "horario inicio";
    echo "</th>";
    echo "<th>";
    echo "Horas fin";
    echo "</th>";
    echo "<th>";
    echo "Dia";
    echo "</th>";
    echo "<th>";
    echo "Editar";
    echo "</th>";
    echo "<th>";
    echo "Borrar";
    echo "</th>";
    echo "</tr>";
    foreach ($resultado as $key => $row) {
        echo "<tr>";
        echo "<td>";
        echo "<p>";
        echo $row["codAsig"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["nombre"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["horasSemanales"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["horasTotales"];
        echo "</p>";
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"mostrarTablaAsignatura.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codAsig"]."\" name=\"cod1\">
        <input class=\"editar\" type=\"submit\" name=\"editar\" value=\"Editar\">
        </form>";
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"mostrarTablaAsignatura.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codAsig"]."\" name=\"cod1\">
        <input class=\"borrar\" type=\"submit\" name=\"borrar\" value=\"Borrar\">
        </form>";
        echo "</td>";
        echo "</tr>"; 
    }
    echo "</table>";
}

function mostrarTablaTramo($resultado){
    echo "<table>";
    echo "<tr>";
    echo "<th>";
    echo "Codigo tramo";
    echo "</th>";
    echo "<th>";
    echo "Horario inicio";
    echo "</th>";
    echo "<th>";
    echo "Horario fin";
    echo "</th>";
    echo "<th>";
    echo "Dia";
    echo "</th>";
    echo "<th>";
    echo "Borrar";
    echo "</th>";
    echo "</tr>";
    foreach ($resultado as $key => $row) {
        echo "<tr>";
        echo "<td>";
        echo "<p>";
        echo $row["codTramo"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["horaInicio"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["horaFin"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["dia"];
        echo "</p>";
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"mostrarTablaTramo.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codTramo"]."\" name=\"cod1\">
        <input class=\"borrar\" type=\"submit\" name=\"borrar\" value=\"Borrar\">
        </form>";
        echo "</td>";
        echo "</tr>"; 
    }
    echo "</table>";
}
function mostrarTablaCurso($resultado){
    echo "<table>";
    echo "<tr>";
    echo "<th>";
    echo "Codigo oferta";
    echo "</th>";
    echo "<th>";
    echo "Fecha Acta";
    echo "</th>";
    echo "<th>";
    echo "Código del curso";
    echo "</th>";
    echo "<th>";
    echo "Código del tutor";
    echo "</th>";
    echo "<th>";
    echo "Editar";
    echo "</th>";
    echo "<th>";
    echo "Borrar";
    echo "</th>";
    echo "</tr>";
    foreach ($resultado as $key => $row) {
        echo "<tr>";
        echo "<td>";
        echo "<p>";
        echo $row["codOe"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["fechaActa"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["codCurso"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["codTutor"];
        echo "</p>";
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"mostrarTablaCurso.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codOe"]."\" name=\"cod1\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["fechaActa"]."\" name=\"cod2\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codCurso"]."\" name=\"cod3\">
        <input class=\"editar\" type=\"submit\" name=\"editar\" value=\"Editar\">
        </form>";
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"mostrarTablaCurso.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codOe"]."\" name=\"cod1\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["fechaActa"]."\" name=\"cod2\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codCurso"]."\" name=\"cod3\">
        <input class=\"borrar\" type=\"submit\" name=\"borrar\" value=\"Borrar\">
        </form>";
        echo "</td>";
        echo "</tr>"; 
    }
    echo "</table>";
}
function mostrarTablaHorario($resultado){
    echo "<table>";
    echo "<tr>";
    echo "<th>";
    echo "Codigo oferta";
    echo "</th>";
    echo "<th>";
    echo "Fecha Acta";
    echo "</th>";
    echo "<th>";
    echo "Código del curso";
    echo "</th>";
    echo "<th>";
    echo "Código de la asignatura";
    echo "</th>";
    echo "<th>";
    echo "Código del tramo";
    echo "</th>";
    echo "<th>";
    echo "Editar";
    echo "</th>";
    echo "<th>";
    echo "Borrar";
    echo "</th>";
    echo "</tr>";
    foreach ($resultado as $key => $row) {
        echo "<tr>";
        echo "<td>";
        echo "<p>";
        echo $row["codOe"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["fechaActa"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["codCurso"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["codAsig"];
        echo "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p>";
        echo $row["codTramo"];
        echo "</p>";
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"mostrarTablaHorario.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codOe"]."\" name=\"cod1\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["fechaActa"]."\" name=\"cod2\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codCurso"]."\" name=\"cod3\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codAsig"]."\" name=\"cod4\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codTramo"]."\" name=\"cod5\">
        <input class=\"editar\" type=\"submit\" name=\"editar\" value=\"Editar\">
        </form>";
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"mostrarTablaHorario.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codOe"]."\" name=\"cod1\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["fechaActa"]."\" name=\"cod2\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codCurso"]."\" name=\"cod3\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codAsig"]."\" name=\"cod4\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codTramo"]."\" name=\"cod5\">
        <input class=\"borrar\" type=\"submit\" name=\"borrar\" value=\"Borrar\">
        </form>";
        echo "</td>";
        echo "</tr>"; 
    }
    echo "</table>";
}
?>