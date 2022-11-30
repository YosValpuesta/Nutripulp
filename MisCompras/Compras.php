<?php
include '../ConexionBD/Conexion.php';
$resultado = $conexion -> query("SELECT DATE_FORMAT(Fecha,'%d/%m/%Y') AS Fecha, Folio, Cantidad, Subtotal, Imagen, Nombre, Precio
                                FROM ventas AS a 
                                INNER JOIN Productos_venta AS b ON b.id_venta = a.id 
                                INNER JOIN productos AS c ON b.id_producto = c.id
                                WHERE id_cliente = 62 GROUP BY Nombre") or die ($conexion -> error);
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
            <td id="encabezado">Fecha</td>
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
            <td><h3><?php echo ($mostrar["Fecha"]); ?><h3></td>
            <td><h3><?php echo ($mostrar["Folio"]); ?><h3></td>
            <td><img id="productoImg" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>"></td>
            <td><h3><?php echo $mostrar["Nombre"]; ?><h3></td>
            <td><h3><?php echo $mostrar["Precio"]; ?><h3></td>
            <td><h3><?php echo $mostrar["Cantidad"]; ?><h3></td>
            <td><h3><?php echo $mostrar["Subtotal"]; ?><h3></td>
        </tr>
        <?php
            } 
        ?>
       
    </table>

</body>
</html>