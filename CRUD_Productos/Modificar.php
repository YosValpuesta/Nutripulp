<?php
include '../ConexionBD/Conexion.php';

$id = $_REQUEST['id'];

$nombre = $_POST['Nombre'];
$precio = $_POST['Precio'];
$existencia = $_POST['Existencia_L'];
$imagen = addslashes(file_get_contents($_FILES["Imagen"]["tmp_name"])); //Guarda los bits 

$productos = "UPDATE productos SET Nombre = '$nombre', Precio = '$precio', Existencia_L = '$existencia', Imagen = '$imagen' WHERE id = '$id'";
$resultado = $conexion->query($productos);

if ($resultado){
    Header("Location: Productos.php");
} else {
    echo "error";
}
?>