<?php
include '../ConexionBD/Conexion.php';
$conexion = conectar();

$id_producto = $_POST['Id_producto'];
$nombre = $_POST['Nombre'];
$precio = $_POST['Precio'];
$existencia = $_POST['Existencia_L'];
$imagen = addslashes(file_get_contents($_FILES["Imagen"]["tmp_name"])); //Guarda los bits 

$productos = "INSERT INTO productos VALUES('$id_producto','$nombre','$precio','$existencia','$imagen')";
$resultado = $conexion->query($productos);

if ($resultado){
    Header("Location: Productos2.php");
} else {
    echo "error";
}
?>