<?php
include '../ConexionBD/Conexion.php';
$conexion = conectar();

$id = $_REQUEST['id'];

$id_producto = $_POST['Id_producto'];
$nombre = $_POST['Nombre'];
$precio = $_POST['Precio'];
$existencia = $_POST['Existencia_L'];
$imagen = addslashes(file_get_contents($_FILES["Imagen"]["tmp_name"]));

$productos = "UPDATE productos SET Nombre = '$nombre',Precio = '$precio',Existencia_L = '$existencia',Imagen = '$imagen' WHERE Id_producto = '$id'";
$resultado = $conexion->query($productos);

if ($resultado) {
    //Header("Location: Productos2.php");
    echo "SE MODIFIcO";
} else {
    echo "error";
}
?>