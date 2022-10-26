<?php
include '../ConexionBD/Conexion.php';

$nombre = $_POST['Nombre'];
$precio = $_POST['Precio'];
$existencia = $_POST['Existencia_L'];
$imagen = addslashes(file_get_contents($_FILES["Imagen"]["tmp_name"])); //Guarda los bits 

$productos = "INSERT INTO productos(Nombre, Precio, Existencia_L, Imagen) VALUES('$nombre','$precio','$existencia','$imagen')";
$resultado = $conexion->query($productos);

if ($resultado){
    Header("Location: Productos.php");
} else {
    echo "error";
}
?>