<?php 
session_start(); 
include '../ConexionBD/Conexion.php';
if (!isset($_SESSION['MiCarrito'])) {
    header('Location: MenuPulpas.php');
}
$arreglo = $_SESSION['MiCarrito'];
$subTotal = 0; //Cada producto
$total = 0; //Suma productos
$totalEnvio = 0;
for ($i = 0; $i < count($arreglo); $i++) {
    $subTotal = $arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad'];
    $total = $total + $subTotal;
    if ($total >= 595) {
        $totalEnvio = $total;
    } else {
        $totalEnvio = $total + 150;
    }
}  
$fecha = date('Y-m-d h:m:s');
$conexion -> query("INSERT INTO ventas (id_usuario, Total, Fecha) VALUES (2,$totalEnvio,'$fecha')") or die($conexion -> error);
$id_venta = $conexion -> insert_id;
for ($i = 0; $i < count($arreglo); $i++) {
    $conexion -> query("INSERT INTO productos_venta(id_venta, id_producto, Cantidad, Precio, Subtotal)
                        VALUES($id_venta, ".$arreglo[$i]['Id'].", ".$arreglo[$i]['Cantidad'].", ".$arreglo[$i]['Precio'].", ".$arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio'].")") or die($conexion -> error);
    $conexion -> query("UPDATE productos SET Existencia_L = Existencia_L -".$arreglo[$i]['Cantidad']." WHERE id = ".$arreglo[$i]['Id']) or die($conexion -> error);
}
unset($_SESSION['MiCarrito']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Finalizada</title>
    <link rel="stylesheet" href="../General.css">
</head>
<body>
    <h1>¡Gracias por tu compra!
        Tu pedido 2000003571876808
        Ya Fue programado con Éxito</h1>
        <input class="botonRegresar" onclick="window.location='../Principal.php'" type="submit" value="Ir a inicio" name="btnInicio">
</body>
</html>