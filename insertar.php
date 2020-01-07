<?php
// Conectando, seleccionando la base de datos
$link = new mysqli('localhost', 'root', '', 'prueba')
    or die('No se pudo conectar: ' . mysqli_error());
//echo 'Connected successfully';

$codigo = mysqli_real_escape_string($link, $_REQUEST['codigo']);
$descripcion = mysqli_real_escape_string($link, $_REQUEST['descripcion']);
$precio = mysqli_real_escape_string($link, $_REQUEST['precio']);
$cantidad = mysqli_real_escape_string($link, $_REQUEST['cantidad']);
$estado = mysqli_real_escape_string($link, $_REQUEST['estado']);

$sql = "INSERT INTO tbproductos (codigo, descripcion, precio, cantidad, estado) VALUES ('$codigo', '$descripcion', $precio, $cantidad, $estado)";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);