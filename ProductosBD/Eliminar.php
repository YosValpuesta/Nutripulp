<?php
include '../ConexionBD/Conexion.php';
$conexion = conectar();

$id = $_REQUEST['id'];

$productos = "DELETE FROM productos WHERE Id_producto = '$id'";
$resultado = $conexion->query($productos);

if ($resultado){
    Header("Location: Productos2.php");
} else {
    echo "error";
}
?>