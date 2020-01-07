<?php
// Conectando, seleccionando la base de datos
$link = new mysqli('localhost', 'root', '', 'prueba')
    or die('No se pudo conectar: ' . mysqli_error());
//echo 'Connected successfully';


// Realizar una consulta MySQL
$query = 'SELECT * FROM tbproductos';
$result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error());

// Imprimir los resultados en HTML
//echo "<table>\n";
while ($line = mysqli_fetch_array($result)) {
    if ($line['estado'] == 1) {
        $disponible = "Disponible";
    } else {
        $disponible = "Agotado";
    }
    echo "\t<tr>\n";
    echo "<td>" . $line['codigo'] . "</td><td>" . $line['descripcion'] . "</td><td>" . $line['precio'] . "</td><td>" . $line['cantidad'] . "</td><td>" . $disponible . "</td>";
    echo "\t</tr>\n";
}
//echo "</table>\n";

// Liberar resultados
mysqli_free_result($result);

// Cerrar la conexión
mysqli_close($link);
?>