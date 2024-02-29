<?php
function mostrarTablaOferta($resultado,$clave){
    echo "<table>";
    echo "<tr>";
    echo "<th>";
    echo "Codigo Oferta";
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
    echo "Fecha de acta";
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
        echo $row["codOe"];
        echo "</td>";
        echo "<td>";
        echo $row["nombre"];
        echo "</td>";
        echo "<td>";
        echo $row["descripcion"];
        echo "</td>";
        echo "<td>";
        echo $row["tipo"];
        echo "</td>";
        echo "<td>";
        echo $row["fechaActa"];
        echo "</td>";
        echo "<td>";
        echo $row["fechaLey"];
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"logicaOferta.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codOe"]."\" name=\"codigoOferta\">
        <input class=\"saltar\" type=\"submit\" name=\"editar\" value=\"Editar\">
        </form>";
        echo "</td>";
        echo "<td>";        
        echo "<form action=\"logicaOferta.php\" method=\"get\">
        <input type=\"text\" hidden=\"true\" value=\"".$row["codOe"]."\" name=\"codigoOferta\">
        <input class=\"saltar\" type=\"submit\" name=\"borrar\" value=\"Borrar\">
        </form>";
        echo "</td>";
        echo "</tr>";
        
    }
    echo "</table>";
}
?>