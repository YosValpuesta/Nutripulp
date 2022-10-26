<?php
include '../ConexionBD/Conexion.php';

$id = $_REQUEST['id'];

$productos = "DELETE FROM productos WHERE id = '$id'";
$resultado = $conexion->query($productos);

if ($resultado){
    Header("Location: Productos.php");
} else {
    echo "error";
}
?>