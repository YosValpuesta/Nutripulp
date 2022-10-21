<?php
include '../ConexionBD/Conexion.php';
$conexion = conectar();

$id_producto = $_GET['id'];

$productos = "DELETE FROM productos WHERE Id_producto = '$id_producto'";
$resultado = mysqli_query($conexion, $productos);

if ($resultado){
    Header("Location: Productos2.php");
} else {
    echo "error";
}
?>