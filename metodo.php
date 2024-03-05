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
        <input class=\"saltar\" type=\"submit\" name=\"editar\" value=\"Editar\">
        </form>";
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"mostrarTablaOferta.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codOe"]."\" name=\"cod1\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["fechaActa"]."\" name=\"cod2\">
        <input class=\"saltar\" type=\"submit\" name=\"borrar\" value=\"Borrar\">
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
        <input class=\"saltar\" type=\"submit\" name=\"editar\" value=\"Editar\">
        </form>";
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"mostrarTablaProfesor.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codProf"]."\" name=\"cod1\">
        <input class=\"saltar\" type=\"submit\" name=\"borrar\" value=\"Borrar\">
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
    echo "Codigo asignatura";
    echo "</th>";
    echo "<th>";
    echo "Nombre";
    echo "</th>";
    echo "<th>";
    echo "Horas semanales";
    echo "</th>";
    echo "<th>";
    echo "Horas totales";
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
        <input class=\"saltar\" type=\"submit\" name=\"editar\" value=\"Editar\">
        </form>";
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"mostrarTablaAsignatura.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codAsig"]."\" name=\"cod1\">
        <input class=\"saltar\" type=\"submit\" name=\"borrar\" value=\"Borrar\">
        </form>";
        echo "</td>";
        echo "</tr>"; 
    }
    echo "</table>";
}
?>