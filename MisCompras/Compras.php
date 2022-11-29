<?php
include '../ConexionBD/Conexion.php';
$resultado = $conexion -> query("SELECT id_venta, id_producto, Cantidad, Subtotal, Nombre, Precio, Imagen FROM productos_venta INNER JOIN Productos ON productos_venta.id_producto = productos.id WHERE id_venta = 6") or die ($conexion -> error);
//$resultado = $conexion -> query("SELECT Fecha, No_Pedido FROM ventas WHERE id = 6") or die ($conexion -> error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../Img/Logo.png">
    <link rel="stylesheet" href="../Productos/General.css">
    <link rel="stylesheet" href="../Carrito/Carrito.css">
    <title>Mis compras</title>
</head>
<body>
    <?php include '../Nav/Header.php' ?>
    <h1 id="productosComprados">Productos comprados</h1>
    <table cellspacing="2" border="10" align="center">
        <tr>
            <td id="encabezado">Fecha de compra</td>
            <td id="encabezado">No_Pedido</td>
            <td id="encabezado" colspan="2">Producto</td>
            <td id="encabezado">Precio</td>
            <td id="encabezado">Cantidad</td>
            <td id="encabezado">SubTotal</td>
        </tr>
        <?php
            while ($mostrar = mysqli_fetch_array($resultado)) { 
        ?>
        <tr>
            <td><h3><?php //echo ($mostrar["Fecha"]); ?><h3></td>
            <td><h3><?php //echo ($mostrar["No_Pedido"]); ?><h3></td>
            <td><img id="productoImg" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>"></td>
            <td><h3><?php echo $mostrar["Nombre"]; ?><h3></td>
            <td><h3><?php echo $mostrar["Precio"]; ?><h3></td>
            <td><h3><?php echo $mostrar["Cantidad"]; ?><h3></td>
            <td><h3>$<?php echo $mostrar(number_format($subtotal,2,'.','');?><h3></td>
        </tr>
        <tr>

        </tr>
        <?php
            } 
        ?>
       
    </table>

</body>
</html>