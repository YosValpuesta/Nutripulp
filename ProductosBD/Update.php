<?php
include '../ConexionBD/Conexion.php';
$conexion = conectar();

$id_producto = $_POST['Id_producto'];
$nombre = $_POST['Nombre'];
$precio = $_POST['Precio'];
$existencia = $_POST['Existencia_L'];

$productos = "UPDATE productos SET Nombre = '$nombre',Precio = '$precio',Existencia_L = '$existencia' WHERE Id_producto = '$id_producto'";
$resultado = mysqli_query($conexion, $productos);

if ($resultado){
    Header("Location: Productos2.php");
} else {
    echo "error";
}
?>