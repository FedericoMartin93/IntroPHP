<?php

include("conexion.php");

$resultado = $conexion -> query("select nom from alumnes");

while ($row = $resultado->fetch_assoc()) {
    echo "<br/>" . $row["nom"] . "<br/>";         
}

?>